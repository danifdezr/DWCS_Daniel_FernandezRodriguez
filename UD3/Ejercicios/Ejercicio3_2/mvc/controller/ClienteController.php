<?php

namespace Ejercicios\Ejercicio3_2\mvc\controller;

use Ejercicios\Ejercicio3_2\mvc\model\ClienteModel;

class ClienteController extends Controller{
    
    public function listarClientes(){
        $clientes = ClienteModel::getClient();
        $this->vista->showView("clientes",['clientes'=>$clientes]);
    }

    public function addClientes(){
        
    }
}