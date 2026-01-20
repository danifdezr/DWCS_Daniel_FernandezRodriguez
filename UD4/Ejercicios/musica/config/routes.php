<?php

use Ejercicios\musica\core\Router;
use Ejercicios\musica\controller\BandaController;

$router->get('/bandas',[BandaController::class, 'index']);
$router->post('/bandas',[BandaController::class, 'store']);
$router->delete('/bandas/{id}',[BandaController::class, 'destroy']);