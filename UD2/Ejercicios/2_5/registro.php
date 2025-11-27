<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<?php
session_start();
session_set_cookie_params(3600);
include_once "conexionBD.php";
//Comprobamos si nos llegan datos del cliente.
$nombre = $_POST['nombre'] ?? null;
$ap1 = $_POST['ape1'] ?? null;
$ap2 = $_POST['ape2'] ?? null;
$mail = $_POST['mail'] ?? null;
$nic = $_POST['nic'] ?? null;
$pass = $_POST['pass'] ?? null;
$pass2 = $_POST['pass2'] ?? null;
if (isset($nombre) && isset($ap1) && isset($mail) && isset($nic) && isset($pass) && isset($pass2)) {
    
    //Realizamos el alta
    //Comprobamos que las contraseñas coincidan.
    $msg = "No se ha podido registrar el usuario";
    if ($pass != $pass2) {
        $msg =  'Las contraseñas introducidas no coinciden.';
    }

    //Comprobamos que el correo tiene un formato correcto.
    if (($mail = filter_var($mail, FILTER_VALIDATE_EMAIL)) === false) {
        $msg = 'Formato de email incorrecto';
    }

    if (insertUsuario($nic, $nombre, $ap1, $ap2, $mail, $pass)) {
        echo '<h2 style="background-color:green;">Usuario registrado</h2>';

    } else {
        echo '<h2 style="color:white;background-color:red;">' . $msg . '</h2>';
    }
}
?>
<h1>Registrar nuevo usuario</h1>

<body>
    <fieldset>
        <form action="" method="post">
            <label for="nombre">Nombre</label><br>
            <input type="text" name="nombre" required><br>
            <label for="ape1">Apellido</label><br>
            <input type="text" name="ape1" required><br>
            <label for="ape2">Apellido 2</label><br>
            <input type="text" name="ape2"><br>
            <label for="mail">Correo electrónico</label><br>
            <input type="email" name="mail" required><br>
            <label for="nic">Nombre de usuario (nic)</label><br>
            <input type="text" name="nic" required><br>
            <label for="pass">Contraseña</label><br>
            <input type="password" name="pass" required><br>
            <label for="pass2">Repita la contraseña</label><br>
            <input type="password" name="pass2" required><br>
            <button type="submit">Registrar</button>
        </form>
    </fieldset>
    <a href="login.php">Login</a>
    <a href="listar.php">Listar</a>
</body>

</html>