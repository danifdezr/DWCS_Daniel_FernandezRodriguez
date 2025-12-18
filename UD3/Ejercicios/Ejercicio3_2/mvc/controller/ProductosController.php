<?php

namespace Ejercicios\Ejercicio3_2\mvc\controller;

use Ejercicios\Ejercicio3_2\mvc\model\ProductosModel;
use Ejercicios\Ejercicio3_2\mvc\model\vo\ProductosVo;

class ProductosController extends Controller{
    public function listarProductos(){
        $productos = ProductosModel::getProduct();
        $this->vista->showView("productos",['producto'=>$productos]);
    }

    public function showAddProductos(){
        $this->vista->showView("add_producto",[]);
    }

    public function productoExito(){
        $this->vista->showView("producto_anadido",[]);
    }

    public function addProducto(){

        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $denominacion = $_POST['denominacion'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
    
            if(isset($denominacion) && isset($descripcion) && isset($precio) && isset($cantidad)){
                $producto = new ProductosVo($denominacion, $descripcion, $precio, $cantidad);
                $aniadir = ProductosModel::addProduct($producto);
        
                if($aniadir){
                    self::productoExito();
                }else{
                    $error = new ErrorController();
                    $error->pageNotFound();
                }
            }
        }
    }
}