<?php
require_once "clases.php";

define('DB_DSN','mysql:host=mariadb;dbname=gestion_proyectos');
define('DB_USER', 'root');
define('DB_PASS','bitnami');

function db_connection(){
    try {
        $db = new PDO(DB_DSN,DB_USER,DB_PASS);
    } catch (PDOException $ex1) {
        die("Error".$ex1->getMessage());
    }
    return $db;
}

function addUser(String $nombre, String $correo, String $pass, int $rol):bool{

    $sql = "SELECT COUNT(*) as Mail FROM usuarios WHERE correo=?";
    $conexion = db_connection();
    $query = $conexion->prepare($sql);
    $query->bindParam(1, $correo, PDO::PARAM_STR);
    $query->execute();
    $resultado = $query->fetch();

    $toret = false;

    if(isset($resultado["Mail"]) && $resultado["Mail"]>0){
        return 'El correo ya existe';
    }
    $query->closeCursor();

    $pass = password_hash($pass,PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios( nombre, correo, pass, id_rol) VALUES (:nombre, :correo, :pass, :rol)";
    $query = $conexion->prepare($sql);
    $query->bindValue('nombre', $nombre);
    $query->bindValue('correo', $correo);
    $query->bindValue('pass', $pass);
    $query->bindValue('rol', $rol);

    try {
        $toret = $query->execute();
    } catch (PDOException $ex2) {
        $toret = false;
        echo $ex2->getMessage();
    }finally{
        $query = null;
        $conexion = null;
    }    

    return $toret; 
}

function errorCount($nombre, $correo, $rol, $pass, $repass){
    $errores = [];

    if(empty($nombre)){
        $errores[] = "El nombre es un campo obligatorio";
    }
    if(empty($correo)){
        $errores[] = "El correo es un campo obligatorio";
    
    }
    if(!isset($rol)){
        $errores[] = "El rol es un campo obligatorio";
    
    }
    if(empty($pass)){
        $errores[] = "Contraseña no válida";
    
    }
    if($pass!=$repass){
        $errores[] = "Ambas contraseñas deben ser iguales";
        
    }
    if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
        $errores[] = "Email no válido";
    }

    return $errores;
}

function getRoles(){
    $sql = "SELECT * FROM roles";
    $db = db_connection();
    $stmt = $db->query($sql);
    $roles = [];
    foreach($stmt as $rol){
        $r = new Rol;
        $r->id = $rol["id"];
        $r->nombre = $rol["nombre"];
        $roles[] = $r;
    }
    $stmt->closeCursor();
    $db = null;

        return $roles;
}

function validarUsuario($correo, $pass){

    $pass = password_hash($pass,PASSWORD_DEFAULT);

    $sql = 'SELECT COUNT(*) as Mail FROM usuarios WHERE correo=? AND pass=?';
    $db  = db_connection();
        $query = $db->prepare($sql);
    $query->bindValue(1,$correo,PDO::PARAM_STR);
    $query->bindValue(2,$pass,PDO::PARAM_STR);
    
}


