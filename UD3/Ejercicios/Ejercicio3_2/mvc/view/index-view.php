<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>

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
            width: 100%;
            max-width: 420px;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #2c3e50;
        }

        nav ul {
            list-style: none;
        }

        nav ul li {
            margin-bottom: 15px;
        }

        nav ul li a {
            display: block;
            text-decoration: none;
            background-color: #3498db;
            color: #ffffff;
            padding: 12px;
            border-radius: 6px;
            text-align: center;
            font-weight: 500;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        nav ul li a:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        nav ul li a:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Menú Principal</h1>

        <nav>
            <ul>
                <li>
                    <a href="index.php?controller=ProductosController&action=listarProductos">
                        📦 Listar Productos
                    </a>
                </li>
                <li>
                    <a href="index.php?controller=ClienteController&action=listarClientes">
                        👥 Listar Clientes
                    </a>
                </li>
                <li>
                    <a href="index.php?controller=ClienteController&action=showAddClientes">
                        ➕ Alta Cliente
                    </a>
                </li>
                <li>
                    <a href="index.php?controller=ProductosController&action=showAddProductos">
                        🛒 Alta Producto
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</body>
</html>
