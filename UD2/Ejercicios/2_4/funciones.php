<?php
define("DB_DSN","mysql:host=maridb;dbname=gestion_proyectos");
define("DB_USER", "root");
define("DB_PASS","bitnami");

function db_connection(){
    try {
        $db = new PDO(DB_DSN,DB_USER,DB_PASS);
    } catch (PDOException $ex1) {
        die("Error");
    }
}

function addUser(String $nombre, String $correo, String $pass, int $rol):bool{

    $sql = "SELECT COUNT(*) as Mail FROM usuarios WHERE correo=?";
    $conexion = db_connection();
    $query = $conexion->prepare($sql);
    $query->bindParam(1, $correo, PDO::PARAM_STR);
    $query->execute();
    $resultado = $query->fetch();

    $toret = false;

    if(!isset($resultado["Mail"])){
        $query->closeCursor();
    
        $pass = sha1($pass);
    
        $sql = "INSERT INTO usuarios( nombre, correo, pass, id_rol) VALUES (:nombre, :correo, :pass, :rol)";
        $query = $conexion->prepare($sql);
        $query->bindParam('nombre', $nombre);
        $query->bindParam('correo', $correo);
        $query->bindParam('pass', $pass);
        $query->bindParam('rol', $rol);

        try {
            $toret = $query->execute();
        } catch (PDOException $ex2) {
            $toret = false;
        }finally{
            $query = null;
            $conexion = null;
        }    
    }

    return $toret; 
}