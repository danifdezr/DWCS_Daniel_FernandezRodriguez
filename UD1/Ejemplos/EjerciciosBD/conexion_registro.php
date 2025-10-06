<?php

function addUsuario($nicUsuario, $nombre, $apellido1, $apellido2="", $correo, $pwd){

//1- Establecer conexion

$db = new mysqli("mariadb", "usuarioBD", "abc123", "bd_registro");
if($db->connect_error){
    echo "Se ha producido un error";
    die();
}

//2- Realizar operaciones
$pwdHash = password_hash($pwd, PASSWORD_DEFAULT);
$sql = "INSERT INTO Usuarios(nicUsuario, nombre, apellido1, apellido2, correo, pwd) VALUES('$nicUsuario','$nombre','$apellido1','$apellido2','$correo','$pwdHash')";
$resultado = $db->query(query: $sql);

//3- Cerrar conexión

$db->close();
return $resultado;

}

//Lógica para cuando recibo peticiones con datos.
$resultado = false;
$nicUsuario = $_POST['nicUsuario']??null;
$nombre = $_POST['nombre']??null;
$apellido1 = $_POST['apellido1']??null;
$apellido2 = $_POST['apellido2']??null;
$correo = $_POST['correo']??null;
$pwd = $_POST['pwd']??null;
if(isset($nombre) && isset($apellido1) && isset($apellido2) && isset($nicUsuario) && isset($correo)){
    $resultado = addUsuario($nicUsuario, $nombre, $apellido1, $apellido2, $correo, $pwdHash);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
</head>
<body>
    <?php if($resultado): ?>
        <h1>Cliente agregado</h1>
        <a href="">Registrarse</a>
        <?php else: ?>
    <h2>Registrarse</h2>
        <form action="" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" required><br>
            <label for="apellido1">Apellido 1</label>
            <input type="text" name="apellido1" required><br>
            <label for="apellido2">Apellido 2</label>
            <input type="text" name="apellido2" ><br>
            <label for="nicUsuario">Nombre de usuario</label>
            <input type="text" name="nicUsuario" required><br>
            <label for="correo">Correo electrónico</label>
            <input type="email" name="correo" required><br>
            <label for="pwd">Contraseña</label>
            <input type="password" name="pwd" required><br>
            <button type="submit">Agregar</button>
        </form>
        <?php endif; ?>
    <br>
    
    <a href="conexion_login.php">Login</a>
    
</body>
</html>