<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Producto</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        label {
            font-size: 1rem;
            color: #333;
            margin-bottom: 8px;
            display: inline-block;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="number"]:focus {
            border-color: #3498db;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #3498db;
            text-decoration: none;
            font-size: 1rem;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>📝 Añadir Producto</h1>

        <form action="?controller=ProductosController&action=addProducto" method="POST">
            <label for="denominacion">Denominación</label>
            <input type="text" name="denominacion" id="denominacion" required>

            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" required>

            <label for="precio">Precio (€)</label>
            <input type="number" name="precio" id="precio" step="0.01" required>

            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" required>

            <input type="submit" value="Añadir Producto">
        </form>

        <div class="back-link">
            <a href="index.php?controller=IndexController&action=getIndex">⬅ Volver al menú principal</a>
        </div>
    </div>

</body>
</html>
