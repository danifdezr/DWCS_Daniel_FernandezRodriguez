<?php

namespace Ejercicios\Ejercicio3_2\mvc\model;

use Ejercicios\Ejercicio3_2\mvc\model\Vo\ProductosVo;
use PDO;
use PDOException;


class ProductosModel extends Model{

    /**
     * Returns an unique Producto equal to the id (cod_producto) sent.
     * @param int $id
     * @return ProductosVo|null
     */
    public static function getProductById(int $id){
        $sql = "SELECT * FROM producto WHERE cod_producto = :id";
        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);

            $stmt->bindValue("id",$id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $th) {
            //DUDA!!!!!!!!!!!
            error_log("Error". $th->getMessage());
        }finally{
            $db = null;
        }

        //DUDA!!!!!!!!!!!
        return isset($row) && $row ? self::rowToVo($row) : null;

    }

    public static function getProduct(){
        $sql = "SELECT * FROM producto";

        try {
            $db = self::getConnection();
            $stmt = $db->query($sql);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $th) {
            error_log("Error". $th->getMessage());
        }finally{
            $db = null;
        }

        return isset($row) && $row ? self::rowToVo($row) : null;
    }

    private static function rowToVo(array $row){
        return new ProductosVo(
            (int) $row['cod_producto'],
            $row['denominacion'],
            $row['descripcion'],
            (float) $row['precio'],
            (int) $row['cantidad']
        );
    }
}