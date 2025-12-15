<?php

namespace Ejercicios\Ejercicio3_2\mvc\Model;
use PDO;
use PDOException;

class Model{
    protected static function getConnection(){
        try{
            $db = new PDO("mysql:host=mariadb;dbname=tienda","root","bitnami");
        }catch(PDOException $th){
            die("Error de conexión".$th->getMessage());
        }
        return $db;
    }
}