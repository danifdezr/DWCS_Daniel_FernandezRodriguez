<?php

namespace Ejercicios\Ejercicio3_2\mvc\controller;
use Ejercicios\Ejercicio3_1\mvc\controller\Controller;
class IndexController extends Controller{

    public function getIndex(){
        $this->vista->showView("index");
    }
}