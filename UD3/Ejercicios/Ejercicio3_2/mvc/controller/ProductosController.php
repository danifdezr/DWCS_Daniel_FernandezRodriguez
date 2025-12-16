<?php

namespace Ejercicios\Ejercicio3_2\mvc\controller;

use Ejercicios\Ejercicio3_2\mvc\model\ProductosModel;

class ProductosController extends Controller{
    public function listarProductos(){
        $productos = ProductosModel::getProduct();
        $this->vista->showView("productos",['producto'=>$productos]);
    }
}