<?php

namespace Ejercicios\Ejercicio3_1\mvc\model;
use Ejercicios\Ejercicio3_1\mvc\model\vo\Escuela;
use Ejercicios\Ejercicio3_1\mvc\model\Model;
class ModelEscuela extends Model{
    /**
     * Devuelve un array con todas las escuelas
     * @return void
     */
    public static function getEscuelas($filtroMunicipio = null, $filtroNombre = null){
        try{
            $db = self::getConnection();
            $sql = 'SELECT * FROM escuela WHERE 1';
        }
    }
}
