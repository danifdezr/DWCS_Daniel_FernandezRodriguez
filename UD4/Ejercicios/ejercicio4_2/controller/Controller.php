<?php

namespace Ejercicios\Ejercicio4_2\controller;

use Ejercicios\ejercicio4_2\core\Request;

class Controller{
    protected Request $request;

    public function __construct(Request &$request){
        $this->request = $request;
    }

    /* public function __constructRequest(Request &$request){
        $this->request = $request;
    } */
}