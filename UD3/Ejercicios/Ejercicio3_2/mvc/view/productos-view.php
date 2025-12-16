<?php
$productos = $data['producto'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
</head>
<body>
    <h1>Listado de Productos</h1>
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
            <?php foreach($productos as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p->denominacion);?></td>
                    <td><?= htmlspecialchars($p->descripcion);?></td>
                    <td><?= $p->precio; ?> €</td>
                    <td><?= $p->cantidad; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>