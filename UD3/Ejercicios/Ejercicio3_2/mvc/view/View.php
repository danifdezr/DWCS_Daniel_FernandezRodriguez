<?php

namespace Ejercicios\Ejercicio3_2\mvc\View;

class View{
    public function showView(string $viewname, ?array $data = null){
        include_once VIEW_PATH."$viewname-view.php";
    }
}