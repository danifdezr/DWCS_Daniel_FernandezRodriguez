<?php

include_once "Direccion.php";

class Estudiante extends Persona{

    private $grado;
    private $calificaciones;
    
    public function __construct($nombre, $edad, Direccion $direccion, $grado) {
        parent::__construct($nombre, $edad, $direccion);
        $this->grado = $grado;
        $this->calificaciones = [];
    }

    public function getGrado()
    {
        return $this->grado;
    }

    public function setGrado($grado)
    {
        $this->grado = $grado;

        return $this;
    }

    public function mostrarInformacion(){
        return "Estudiante ". $this->getNombre(). " de ".$this->getEdad(). " años. Estudia el grado ".$this->grado;
    }

    public static function calcularPromedio(array $notas){
        $media = 0;
        foreach($notas as $nota){
            $media += $nota;
        }
        $media = $media / count($notas);
        return $media;
    }

    public function addCalificacion(int $calificacion){
        $this->calificaciones[] = $calificacion;
        return $this;
    }

    public function getMedia(){

        return Estudiante::calcularPromedio($this->calificaciones);
    }

   
}





