<?php
$productos = $data['producto'] ?? [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>

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
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        thead {
            background-color: #3498db;
            color: #ffffff;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
        }

        tbody tr {
            border-bottom: 1px solid #e0e0e0;
        }

        tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }

        tbody tr:hover {
            background-color: #eef4fb;
        }

        .precio {
            font-weight: bold;
            color: #27ae60;
        }

        .acciones {
            text-align: center;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            background-color: #3498db;
            color: #ffffff;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .vacio {
            text-align: center;
            padding: 20px;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>📦 Listado de Productos</h1>

        <table>
            <thead>
                <tr>
                    <th>Denominación</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($productos)): ?>
                    <?php foreach ($productos as $p): ?>
                        <tr>
                            <td><?= htmlspecialchars($p->denominacion); ?></td>
                            <td><?= htmlspecialchars($p->descripcion); ?></td>
                            <td class="precio"><?= number_format($p->precio, 2); ?> €</td>
                            <td><?= $p->cantidad; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="vacio">No hay productos disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div style="text-align:center;">
            <a class="btn" href="index.php?controller=IndexController&action=getIndex">
                ⬅ Volver al menú principal
            </a>
        </div>
    </div>

</body>
</html>
