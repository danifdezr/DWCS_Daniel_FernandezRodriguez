<?php
require_once "funciones.php";
if($_GET['restringido.php']){
    echo "hola";
}

session_start();

$nic = $_POST['nic'] ?? null;
$pass = $_POST['pass'] ?? null;
if($nic!=null && $pass!=null){
    if(comprobar_usuario($nic,$pass)){
        $_SESSION['nombre']=$nic;
        header("Location: restringido.php");
    }else{
        Echo "Usuario o contraseña incorrectos";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <fieldset>
        <form action="" method="post">
            <label for="nic">Nombre de usuario (nic)</label><br>
            <input type="text" name="nic"><br>
            <label for="pass">Contraseña</label><br>
            <input type="password" name="pass"><br>
            <button type="submit">Acceder</button>
        </form>
    </fieldset>
    <a href="registro.php">Registrar usuario</a>
    
</body>
</html>