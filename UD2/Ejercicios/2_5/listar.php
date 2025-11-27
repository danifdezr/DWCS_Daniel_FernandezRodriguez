<?php
include_once "conexionBD.php";
session_start();

$orden = $_POST['filtro'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <form action="" method="post">
            <select name="filtro" id="filtro">
                <option value="nombre">Nombre</option>
                <option value="apellido1">Apellido</option>
            </select>
            <button type="submit">Filtrar</button>
        </form>
    </fieldset>
    <table>
        <tr>
            <th>Nic</th>
            <th>Nombre</th>
            <th>Apellido1</th>
            <th>Apellido2</th>
        </tr>
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            if(isset($orden)){
                $usuarios = filtro($orden);
            }
            foreach($usuarios as $u){
                echo "<tr>";
                echo "<td>".$u->nic."</td>";
                echo "<td>".$u->nombre."</td>";
                echo "<td>".$u->apellido1."</td>";
                echo "<td>".$u->apellido2."</td>";
                echo "</tr>";
            }
        }
    ?>
    </table>
    <?php
        $params = session_get_cookie_params();
        
        setcookie(session_name(),'',time()-1000,$params['path'],$params['domain'],$params['secure'], $params['httponly']);
    ?>
    <a href="registro.php">Registrarse</a>
</body>
</html>