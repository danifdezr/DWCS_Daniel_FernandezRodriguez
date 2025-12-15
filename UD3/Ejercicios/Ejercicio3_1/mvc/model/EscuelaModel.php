<?php

namespace Ejercicios\Ejercicio3_1\mvc\model;
use Ejercicios\Ejercicio3_1\mvc\model\vo\EscuelaVO;
use Ejercicios\Ejercicio3_1\mvc\model\Model;
use PDO;
use PDOException;
class EscuelaModel extends Model
{
    /**
     * Summary of getEscuelas
     * @param mixed $filtroMunicipio
     * @param mixed $filtroNombre
     * @return EscuelaVO[]
     */
    public static function getEscuelas($filtroMunicipio = null, $filtroNombre = null)
    {
        $escuelas = [];
        try {
            $db = self::getConnection();
            $sql = 'SELECT * FROM escuela WHERE 1=1';

            if (isset($filtroMunicipio)) {
                $sql .= ' AND cod_municipio = :filtroMunicipio';
            }

            if (isset($filtroNombre)) {
                $sql .= ' AND nombre LIKE :filtroNombre';
            }

            $stmt = $db->prepare($sql);

            if (isset($filtroMunicipio)) {
                $stmt->bindValue("filtroMunicipio", $filtroMunicipio, PDO::PARAM_INT);
            }
            if (isset($filtroNombre)) {
                $stmt->bindValue("filtroNombre", $filtroNombre, PDO::PARAM_STR);
            }


            $stmt->execute();
            $rows = $stmt->fetch();
            foreach ($rows as $row) {
                $escuela = new EscuelaVO();
                $escuela->$nombre = $row['nombre'];
                $escuela->$direccion = $row['direccion'];
                $escuela->$cod_municipio = $row['cod_municipio'];
                $escuela->$hora_apertura = $row['hora_apertura'];
                $escuela->$hora_cierre = $row['hora_cierre'];
                $escuela->$comedor = $row['comedor'];

                $escuelas[] = $escuela;
            }



        } catch (PDOException $th) {
            die($th->getMessage());
        } finally {
            $stmt = null;
            $db = null;
        }
        return $escuelas;
    }
}


