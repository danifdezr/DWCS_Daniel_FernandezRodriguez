<?php

namespace Ejercicios\Ejercicio3_2\mvc\model;

use PDO;
use PDOException;
use Ejercicios\Ejercicio3_2\mvc\model\vo\ClienteVo;

class ClienteModel extends Model{

    /**
     * Returns an unique Cliente equal to the id (cod_cliente) sent.
     * @param int $id
     * @return ClienteVo|null
     */
    public static function getClientById(int $id){
        $sql = "SELECT * FROM cliente WHERE cod_cliente = :id";
        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);

            $stmt->bindValue("id",$id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $th) {
            error_log("Error". $th->getMessage());
        }finally{
            $db = null;
        }

        return isset($row) && $row ? self::rowToVo($row) : null;

    }

    public static function getClient(){
        $sql = "SELECT nombre, apellidos, telefono, mail FROM cliente";
        $clientes = [];
        try {
            $db = self::getConnection();
            $stmt = $db->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                $cliente = self::rowToVo($row);
                $clientes[] = $cliente;
            }

        } catch (PDOException $th) {
            error_log("Error". $th->getMessage());
        }finally{
            $db = null;
        }

        return isset($clientes) && $clientes ? $clientes : null;
    }

    public static function addClient(ClienteVo $cliente){
        $sql = "INSERT INTO cliente(nombre, apellidos, telefono, mail) VALUES (:nombre,:apellidos,:telefono,:mail)";
        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':nombre', $cliente->nombre,PDO::PARAM_STR);
            $stmt->bindValue(':apellidos', $cliente->apellidos,PDO::PARAM_STR);
            $stmt->bindValue(':telefono', $cliente->telefono,PDO::PARAM_INT);
            $stmt->bindValue(':mail', $cliente->mail,PDO::PARAM_STR);
            
            $toret = $stmt->execute();
        } catch (\Throwable $th) {
            $toret = false;
            $db = null;
        }

        return $toret;
    }

    private static function rowToVo(array $row){
        return new ClienteVo(
            $row['nombre'],
            $row['apellidos'],
            (int) $row['telefono'],
             $row['mail']
        );
    }
}