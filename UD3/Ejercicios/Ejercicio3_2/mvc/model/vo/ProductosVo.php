<?php

namespace Ejercicios\Ejercicio3_2\mvc\model\Vo;

class ProductosVo{

    public ?int $cod_producto;
    public ?string $denominacion;
    public ?string $descripcion;
    public ?float $precio;
    public ?int $cantidad;

    public function __construct(
        ?int $cod_producto = null,
        ?string $denominacion = null,
        ?string $descripcion = null,
        ?float $precio = null,
        ?int $cantidad = null
    ){
        $this->cod_producto = $cod_producto;
        $this->denominacion = $denominacion;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
    }
}