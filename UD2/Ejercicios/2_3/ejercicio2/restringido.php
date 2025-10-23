<?php
session_start();
$nombre = $_SESSION['nombre'];

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sección restringida</title>
</head>
<body>
    <h1>Sección restringida</h1>
    <?php if(isset($_SESSION['nombre'])): ?>
    Estás logueado con el usuario <?= $nombre?>. Pulsa aquí para salir: <a href="logout.php">Logout</a>
    <p>
        Esta sección esta restringida solo para los usuarios que están registrados.
    </p>
</body>
</html>

<?php else: ?>
<p>Acceso denegado</p>
<a href="logout.php">Logout</a>
<?php endif ?>