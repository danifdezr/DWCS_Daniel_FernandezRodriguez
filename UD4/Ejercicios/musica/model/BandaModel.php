<?php

namespace Ejercicios\musica\model;

use PDO;
use Ejercicios\musica\model\vo\BandaVo;

class BandaModel extends Model{

    public static function getBandas(){
        $sql = "SELECT id, nombre, num_integrantes, genero, nacionalidad FROM banda";
        $bandas = [];
        try {
            $db = self::getConnection();
            $stmt = $db->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                $banda = self::rowToVo($row);
                $bandas[] = $banda;
            }
        } catch (\Throwable $th) {
            error_log("Error".$th->getMessage());
        }finally{
            $db = null;
        }
        return $bandas;
    }

    public static function addBanda(BandaVo $banda){
        $sql = "INSERT INTO banda (nombre, num_integrantes, genero, nacionalidad) VALUES (:nombre,:num_integrantes,:genero,:nacionalidad)";
        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':nombre', $banda->getNombre(),PDO::PARAM_STR);
            $stmt->bindValue(':num_integrantes', $banda->getNum_integrantes(),PDO::PARAM_STR);
            $stmt->bindValue(':genero', $banda->getGenero(),PDO::PARAM_STR);
            $stmt->bindValue(':nacionalidad', $banda->getNacionalidad(),PDO::PARAM_STR);
            
            if($stmt->execute()){
                $id = $banda->getId();
            }
        } catch (\Throwable $th) {
            error_log("Error agregando municipio: ".$th->getMessage());
        }finally{
            $db = null;
        }

        return $id;
    }

    public static function delete(int $id){
        $sql = "DELETE FROM banda WHERE id = :id";
        $result = false;

        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_STR);
            if($stmt->execute()){
                $result = $stmt->rowCount() === 1;
            }
        } catch (\Throwable $th) {
            error_log("Error eliminando banda $id" .$th->getMessage());
        }finally{
            $db = null;
        }

        return $result;
    }

    private static function rowToVo(array $row){
        return new BandaVo(
            $row['id'],
            $row['nombre'],
            $row['num_integrantes'],
            $row['genero'],
            $row['nacionalidad']
        );
    }
}