<?php

class Direccion{

    protected $calle;
    protected $ciudad;
    protected $codigoPostal;

    public function __construct($calle, $ciudad, $codigoPostal) {
        $this->calle = $calle;
        $this->ciudad = $ciudad;
        $this->codigoPostal = $codigoPostal;
    }
    public function getDireccion(){
        echo("Calle: ".$this->calle."\nCiudad: ".$this->ciudad."\nCódigo Postal: ".$this->codigoPostal);
    }


    public function getCalle()
    {
        return $this->calle;
    }

    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    public function getCiudad()
    {
        return $this->ciudad;
    }

   
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    public function getCodigoPostal()
        {
            return $this->codigoPostal;
        }

    public function setCodigoPostal($codigoPostal)
        {
            $this->codigoPostal = $codigoPostal;

            return $this;
        }
}

class Persona {

    private $nombre;
    private $edad;
    protected Direccion $direccion;
    

    public function __construct($nombre, $edad, Direccion $direccion) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->direccion = $direccion;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nuevoNombre){
        $this->nombre = $nuevoNombre;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function setEdad($nuevaEdad){
        if($nuevaEdad>=0 && is_int($nuevaEdad)){
            $this->edad = $nuevaEdad;
        }else{
            echo "La edad o ha podido ser actualizada, debe ser un número positivo";
        }
    }

    public function esMayorDeEdad():bool{
        
        return $this->edad>=18;
    }

    public function direccionPersona(){

        $this->direccion->getDireccion();
    }

    public function mostraInformacion(){
        return "$this->nombre, $this->edad años, ".$this->direccion->getDireccion();
    }

}

// $d = new Direccion("plaza mayor, 3", "Vilagarcía", "36254");
// $p = new Persona("Daniel", 22, $d);

// echo "La persona ", $p->getNombre(), " vive en ", $p->direccionPersona();

