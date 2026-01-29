<?php

namespace Ejercicios\musica\model;

use PDO;
use PDOException;
use Ejercicios\musica\model\vo\DiscoVo;

class DiscoModel extends Model {

    public static function getById(int $id): ?DiscoVo
    {
        $sql = "SELECT * FROM disco WHERE id = :id";
        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            error_log("Error obteniendo disco por ID: " . $th->getMessage());
        } finally {
            $db = null;
        }

        return $row ? self::rowToVO($row) : null;
    }

    public static function getByIdBanda(int $id)
    {
        $sql = "SELECT * FROM disco WHERE id_banda = :id";
        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $discos = [];
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                $disco = self::rowToVo($row);
                $discos[] = $disco;
            }
        } catch (PDOException $th) {
            error_log("Error obteniendo disco por ID de banda: " . $th->getMessage());
        } finally {
            $db = null;
        }

        return $discos;
    }

    public static function getDisco(){
        $sql = "SELECT * FROM disco";
        $discos = [];
        try {
            $db = self::getConnection();
            $stmt = $db->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                $disco = self::rowToVo($row);
                $discos[] = $disco;
            }
        } catch (\Throwable $th) {
            error_log("Error".$th->getMessage());
        }finally{
            $db = null;
        }
        return $discos;
    }

    public static function addDisco(DiscoVo $disco):DiscoVo | false{
        $sql = "INSERT INTO disco (titulo, anho, id_banda) VALUES (:titulo,:anho,:id_banda)";
        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':titulo', $disco->getTitulo(),PDO::PARAM_STR);
            $stmt->bindValue(':anho', $disco->getAnho(),PDO::PARAM_INT);
            $stmt->bindValue(':id_banda', $disco->getId_banda(),PDO::PARAM_INT);
            
            if($stmt->execute()){
                $id = $disco->getId();
            }
        } catch (\Throwable $th) {
            error_log("Error agregando Disco: ".$th->getMessage());
        }finally{
            $db = null;
        }

        return $id ? self::getById($id) : false;
    }

    public static function update(DiscoVo $vo){
        if ($vo->getId() === null)
            return false;

        $sql = "UPDATE disco SET
                    titulo = :titulo,
                    anho = :anho,
                    id_banda = :id_banda
                WHERE id = :id";
        $result = false;

        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(":titulo", $vo->getTitulo());
            $stmt->bindValue(":anho", $vo->getAnho());
            $stmt->bindValue(":id_banda", $vo->getId_banda());
            $stmt->bindValue(":id", $vo->getId(), PDO::PARAM_INT);

            $result = $stmt->execute();
        } catch (PDOException $th) {
            error_log("Error actualizando disco: " . $th->getMessage());
        } finally {
            $db = null;
        }

        return $result ? self::getById($vo->getId()) : false;
    }

    private static function rowToVo(array $row): DiscoVo{
        return new DiscoVo(
            $row['id'],
            $row['titulo'],
            $row['anho'],
            $row['id_banda'],
        );
    }

}