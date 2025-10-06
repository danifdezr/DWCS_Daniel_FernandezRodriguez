<?php

include_once "Estudiantes.php";

class Curso {

    private $estudiantes;
    private $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
        $this->estudiantes = [];
    }

    public function addEstudiantes(Estudiante $e){
        $this->estudiantes[] = $e;
    }

    public function mostrarEstudiantes(){
        $toret = '';
        foreach($this->estudiantes as $e){
            $toret .= "<br>".$e->mostrarInformacion();
        }

        return $toret;
    }
}


$d = new Direccion("Prueba", "Pontevedra","36002");
$estudiante = new Estudiante("Daniel", 22, $d, "Ingeniería Informática");

$estudiante->addCalificacion(5);

$e2 = clone $estudiante;

$e2->setNombre("María");
$e2->setEdad(22);

$curso = new Curso("DAW2-A");
$curso->addEstudiantes($estudiante);
$curso->addEstudiantes($e2);

echo $curso->mostrarEstudiantes();