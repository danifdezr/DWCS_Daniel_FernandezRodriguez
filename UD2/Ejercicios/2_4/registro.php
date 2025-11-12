<?php
include_once "funciones.php";

$roles = getRoles();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $nombre = $_POST['nombre'] ?? null;
    $correo = $_POST['correo'] ?? null;
    $rol = intval($_POST['rol']) ?? null;
    $pass = $_POST['pass'] ?? null;
    $repass = $_POST['repass'] ?? null;
    
    $errores = errorCount($nombre,$correo,$rol,$pass,$repass);
    
    if(!empty($errores)){
        foreach($errors as $err){
            echo $err;
            echo "<br>";
        }
    }else{
        addUser($nombre,$correo,$pass,$rol);
        echo "Usuario creado";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantilla Base Web</title>
    <!--Inclusión de Boostrap mediante CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <!--Inclusión del archivo favicon-->
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
    <!--Inclusión del archivo css-->
    <link rel="stylesheet" href="./assets/css/generic.css" />
    <!--Inclusión del archivo javascript-->
    <link rel="stylesheet" href="./assets/js/master.js" />

</head>

<body>
    <div class="container mt-5" style="max-width: 500px;">
        <h1 class="text-center mb-4">Registro</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="joedoe@mail.com">
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Joe Doe">
            </div>

            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <?php
                echo '<select class="form-select" id="rol" name="rol">';
                foreach($roles as $r){
                    echo "<option value=$r->id>$r->nombre</option>";
                }
                echo '</select><br>';
                ?>
            </div>

            <div class="mb-3">
                <label for="pass" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="************">
            </div>

            <div class="mb-4">
                <label for="repass" class="form-label">Repita contraseña</label>
                <input type="password" class="form-control" id="repass" name="repass" placeholder="************">
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</body>

</html>