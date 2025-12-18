<?php

namespace Ejercicios\Ejercicio3_2\mvc\controller;

use Ejercicios\Ejercicio3_2\mvc\model\ClienteModel;
use Ejercicios\Ejercicio3_2\mvc\model\vo\ClienteVo;
use Ejercicios\Ejercicio3_2\mvc\controller\ErrorController;

class ClienteController extends Controller{
    
    public function listarClientes(){
        $clientes = ClienteModel::getClient();
        $this->vista->showView("clientes",['clientes'=>$clientes]);
    }

    public function showAddClientes(){
        $this->vista->showView("add_cliente",[]);
    }

    public function clienteExito(){
        $this->vista->showView("cliente_anadido",[]);
    }

    public function addCliente(){

        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['tel'];
            $mail = $_POST['mail'];
    
            if(isset($nombre) && isset($apellidos) && isset($telefono) && isset($mail)){
                $cliente = new ClienteVo($nombre, $apellidos, $telefono, $mail);
                $aniadir = ClienteModel::addClient($cliente);
        
                if($aniadir){
                    self::clienteExito();
                }else{
                    $error = new ErrorController();
                    $error->pageNotFound();
                }
            }
        }
    }
}