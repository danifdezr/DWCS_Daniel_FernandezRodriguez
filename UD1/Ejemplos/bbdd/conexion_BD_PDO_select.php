<?php

function getClients(){

//1- Establecer conexion
//Cadena de conexión: conector:host=xx;dbname=ddbb
$dsn = "mysql:host=mariadb;dbname=mi_base_de_datos";

try{
    $db = new PDO($dsn, "usuarioBD", "abc123");
}catch(PDOException $ex){
    echo "Se ha producido un error";
    die();
}

//2- Realizar operaciones

$sql = "SELECT id_cliente, nombre, telefono FROM clientes";

//PDOStatement
$resultado = $db->query("$sql");
$datos = $resultado->fetchAll();

//3- Cerrar conexión
$resultado->closeCursor();
$db = null;
return $datos;

}

$cursor = getClients();
echo "<ul>";
foreach($datos as $fila){
    echo "<li>",$fila["nombre"]," (", $fila["telefono"],")";
}
echo "</ul>";

?>

<a href="conexion_BD_mysqli_insert.php">Nuevo Cliente</a>