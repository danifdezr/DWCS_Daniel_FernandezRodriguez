<?php

namespace Ejercicios\Ejercicio3_1\mvc\controller;
use Ejercicios\Ejercicio3_1\mvc\view\view;

class Controller{
    protected View $vista;

    public function __construct(){
        $this->vista = new View();
    }
}