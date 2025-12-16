<?php

namespace Ejercicios\Ejercicio3_2\mvc\controller;
use Ejercicios\Ejercicio3_2\mvc\view\View;

class Controller{
    protected View $vista;

    public function __construct(){
        $this->vista = new View();
    }
}