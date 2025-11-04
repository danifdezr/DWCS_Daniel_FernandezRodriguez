<?php
require_once "funciones.php";

session_start();
if(isset($_SESSION['loged'])){
    header("Location: restringido.php");
    exit;
}

$recordar = $_POST['check'] ?? null;
$nic = $_POST['nic'] ?? null;
$pass = $_POST['pass'] ?? null;
if (isset($nic) && isset($pass) && !empty($nic) && !empty($pass)) {
    if (comprobar_usuario($nic, $pass)) {
        $_SESSION['loged'] = $nic;
        //Impedir el acceso a la cookie de sesión por JavaScript.
        $sesParams = session_get_cookie_params();
        setcookie(session_name(),session_id(),$sesParams['lifetime'], $sesParams['path'], $sesParams['domain'], $sesParams['scure'], true);
        $_SESSION['tiempo'] = time()+600;
        header("Location: restringido.php");
    } else {
        $error = "Login Incorrecto";
    }
}

if (isset($recordar)) {
    setcookie('recordar', $_SESSION['nombre'], time() + 86400 * 30);
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
            <input type="text" name="nic" value="<?php echo isset($_COOKIE['recordar']) ? $_COOKIE['recordar'] :'';?>"><br>
            <label for="pass">Contraseña</label><br>
            <input type="password" name="pass"><br>
            <label for="check">Recuérdame</label>
            <input type="checkbox" name="check" id="check"><br>
            <button type="submit">Acceder</button>
        </form>
    </fieldset>
    <?php 
    if(isset($error)){
        echo "<pre styles='color:red'>$error</pre>";
    }
    ?>
    <a href="registro.php">Registrar usuario</a>
    
</body>
</html>