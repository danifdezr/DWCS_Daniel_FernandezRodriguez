<?php

namespace Ejercicios\Ejercicio3_2\mvc\model\vo;

class ProductosVo{

    public ?int $cod_producto;
    public ?string $denominacion;
    public ?string $descripcion;
    public ?float $precio;
    public ?int $cantidad;

    public function __construct(
        ?string $denominacion = null,
        ?string $descripcion = null,
        ?float $precio = null,
        ?int $cantidad = null
    ){
        $this->denominacion = $denominacion;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
    }
}