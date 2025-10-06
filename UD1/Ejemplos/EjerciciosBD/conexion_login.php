<?php

function checkUsuarios($nicUsuario, $pwd)
{

    //1- Establecer conexion

    $db = new mysqli("mariadb", "usuarioBD", "abc123", "bd_registro");
    if ($db->connect_error) {
        echo "Se ha producido un error";
        die();
    }
    //hola
    //2- Realizar operaciones

    $sql = "SELECT nicUsuario, pwd FROM Usuarios WHERE nicUsuario='$nicUsuario' and pwd='$pwd'";
    $resultado = $db->query($sql);
    // var_dump($resultado);
    //$row_cnt = $result->num_rows;
    //3- Cerrar conexión

    $db->close();
    return $resultado;

}

$nicUsuario = $_POST['nicUsuario'] ?? null;
$pwd = $_POST['pwd'] ?? null;
$pwd = password_hash($pwd);
if(checkUsuarios($nicUsuario, $pwd)){
    //Login success.
}else{
    //Login fail
}
echo "<ul>";
while ($fila = $cursor->fetch_array()) {
    echo "<li>", $fila["nombre"], " (", $fila["telefono"], ")";
}
echo "</ul>";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
</head>

<body>
    <?php if ($resultado): ?>
        <h1>Cliente agregado</h1>
        <a href="">Login</a>
    <?php else: ?>
        <h2>Login</h2>
        <form action="" method="post">
            <label for="nicUsuario">Nombre de usuario</label>
            <input type="text" name="nicUsuario" required><br>
            <label for="pwd">Contraseña</label>
            <input type="password" name="pwd" required><br>
            <button type="submit">Iniciar Sesión</button>
        </form>
    <?php endif; ?>
    <br>

    <a href="conexion_login.php">Login</a>

</body>

</html>
<a href="conexion_BD_mysqli_insert.php">Registrarse</a>