<?php

namespace Ejercicios\Ejercicio3_2\mvc\model\vo;

class ClienteVo{

    public ?int $cod_cliente;
    public ?string $nombre;
    public ?string $apellidos;
    public ?int $telefono;
    public ?string $mail;

    public function __construct(
        ?string $nombre = null,
        ?string $apellidos = null,
        ?int $telefono = null,
        ?string $mail = null
    ){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->mail = $mail;
    }
}

