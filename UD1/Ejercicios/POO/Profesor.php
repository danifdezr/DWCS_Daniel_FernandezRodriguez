<?php

include_once "Persona.php";

class Profesor extends Persona{

    private $especialidad;

    public function __construct($nombre, $edad, Direccion $direccion, $especialidad) {
        parent::__construct($nombre, $edad, $direccion );
        $this->especialidad = $especialidad;
    }

    public function getEspecialidad()
        {
                return $this->especialidad;
        }

    public function setEspecialidad($especialidad)
        {
                $this->especialidad = $especialidad;

                return $this;
        }

    public function mostrarInformacion(){
        return parent::mostraInformacion().$this->especialidad;
    }
}