<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cliente añadido</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .mensaje {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .mensaje h1 {
            color: #28a745;
        }
        .mensaje a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .mensaje a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="mensaje">
        <h1>✔ Cliente añadido con éxito</h1>
        <p>El cliente ha sido registrado correctamente en el sistema.</p>

        <a href="index.php?controller=ProductosController&action=listarProductos">
            Ver lista de productos
        </a>

        <br><br>

        <a href="index.php?controller=IndexController&action=getIndex">
            Volver al menú principal
        </a>
    </div>

</body>
</html>
