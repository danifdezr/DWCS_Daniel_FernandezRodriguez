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

<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    
  <div class="card shadow-lg text-center p-4" style="max-width: 400px;">
    <div class="card-body">
      <h3 class="card-title text-success mb-3">
        Usuario creado correctamente
      </h3>
      <p class="card-text text-muted mb-4">
        Tu cuenta ha sido creada exitosamente. ¿Qué deseas hacer ahora?
      </p>

      <div class="d-grid gap-2">
        <a href="registro.php" class="btn btn-outline-primary">Registrarse</a>
        <a href="login.php" class="btn btn-primary">Iniciar sesión</a>
      </div>
    </div>
  </div>
</body>

</html>