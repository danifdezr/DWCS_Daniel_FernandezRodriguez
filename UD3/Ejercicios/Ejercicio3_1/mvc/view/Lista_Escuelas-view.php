<?php
namespace Ejercicios\Ejercicio3_1\mvc\view;

$escuelas = $data['escuelas'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de escuelas</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Municipio</th>
                <th>Hora apertura</th>
                <th>Hora cierre</th>
                <th>Comedor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($escuelas as $e): ?>
            <tr>
                <td><?php $e->nombre; ?></td>
                <td><?php $e->direccion; ?></td>
                <td><?php $e->cod_municipio; ?></td>
                <td><?php $e->hora_apertura; ?></td>
                <td><?php $e->hora_cierre; ?></td>
                <td><?php $e->comedor; ?></td>
            </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
</body>
</html>