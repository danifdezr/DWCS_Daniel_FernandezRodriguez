<?php

namespace Ejercicios\Ejercicio3_1\mvc\model;
use Pdo;
use PDOException;
class Model{
    protected static function getConnection(){
        try{
            $db = new PDO("mysql:host=mariadb;dbname=escolas_infantis", "root", "bitnami");
        }catch(PDOException $th){
            die("Error de conexión".$th->getMessage());
        }
        return $db;
    }
}
