<?php

namespace Ejercicios\Ejercicio3_1\mvc\controller;

class ErrorController{

    public function pageNotFound(){
        include_once "pageNotFound-view.php";
    }
}