<?php
include_once "usuarios.php";
function conexionBD(){

    try {
        $db = new PDO("mysql:host=mariadb;dbname=repaso","root","bitnami");
    } catch (PDOException $th) {
        die("Error".$th->getMessage());
    }
    return $db;
}

function insertUsuario($nic, $nombre, $apellido1, $apellido2, $mail, $pass){
    $sql = "INSERT INTO USUARIO(nic, nombre, apellido1, apellido2, mail, pass) VALUES (:nic,:nombre,:apellido1,:apellido2,:mail,:pass)";

    $db = conexionBD();
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":nic",$nic,PDO::PARAM_STR);
    $stmt->bindValue(":nombre",$nombre,PDO::PARAM_STR);
    $stmt->bindValue(":apellido1",$apellido1,PDO::PARAM_STR);
    $stmt->bindValue(":apellido2",$apellido2,PDO::PARAM_STR);
    $stmt->bindValue(":mail",$mail,PDO::PARAM_STR);
    $stmt->bindValue(":pass",$pass,PDO::PARAM_STR);

    try {
        $toret = $stmt->execute();
    } catch (PDOException $th) {
        echo $th->getMessage();
        $toret = false;
    }finally{
        $stmt = null;
        $db = null;
    }

    return $toret;
}

function filtro($orden = null){
    $sql = "SELECT * FROM `USUARIO` order by $orden";
    $db = conexionBD();
    $stmt = $db->query($sql);
    try {
        $usuarios = [];
        foreach($stmt as $u){
            $usuario = new Usuario();
            $usuario->nic = $u['nic'];
            $usuario->nombre = $u['nombre'];
            $usuario->apellido1 = $u['apellido1'];
            $usuario->apellido2 = $u['apellido2'];
            $usuario->mail = $u['mail'];
            $usuario->pass = $u['pass'];
            $usuarios[] = $usuario;
        }
        
    } catch (PDOException $th) {
        echo $th->getMessage();
    }finally{
        $stmt = null;
        $db = null;
    }
    
    return $usuarios;
}