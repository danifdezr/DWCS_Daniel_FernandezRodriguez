<?php

namespace Ejercicios\ejercicio4_2\config;

use Ejercicios\ejercicio4_2\controller\AuthController;
use Ejercicios\ejercicio4_2\core\middleware\JwtMiddleware;
use Ejercicios\ejercicio4_2\controller\SensorController;

$router->post("/login", [AuthController::class, 'login']);
$router->post("/sensores", [SensorController::class, 'store'], [JwtMiddleware::class]);
$router->get("/sensores", [SensorController::class, 'show'], [JwtMiddleware::class]);

