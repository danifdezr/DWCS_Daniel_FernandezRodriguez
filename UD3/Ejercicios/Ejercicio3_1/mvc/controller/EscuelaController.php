<?php

namespace Ejercicios\Ejercicio3_1\mvc\controller;
use Ejercicios\Ejercicio3_1\mvc\model\EscuelaModel;
use Ejercicios\Ejercicio3_1\mvc\model\Model;


class EscuelaController extends Controller{

    public function listarEscuelas(){
        $filterMunicipio = $_REQUEST['cod_municipio'] ?? '';
        $filterNombre = $_REQUEST['nombre'] ?? '';
        $filters = ['nombre' => $filterNombre];

        if(!empty($filterMunicipio)){
            $filters['cod_municipio'] = intval($filterMunicipio);
        }
        $escuelas = EscuelaModel::getEscuelas($filters);

         $this->vista->showView("Lista_Escuelas",['escuelas'=>$escuelas]);
    }
}