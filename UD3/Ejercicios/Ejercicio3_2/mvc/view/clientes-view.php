<?php
$clientes = $data['clientes'] ?? [];
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
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>Mail</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($clientes as $c): ?>
                <tr>
                    <td><?= htmlspecialchars($c->nombre);?></td>
                    <td><?= htmlspecialchars($c->apellidos);?></td>
                    <td><?= (int) $c->telefono; ?></td>
                    <td><?= htmlspecialchars($c->mail); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?controller=IndexController&&action=getIndex">Menu Principal</a>
</body>
</html>