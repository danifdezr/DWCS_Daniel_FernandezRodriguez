<?php

use Ejercicios\musica\controller\DiscoController;
use Ejercicios\musica\core\Router;
use Ejercicios\musica\controller\BandaController;

$router->get('/bandas',[BandaController::class, 'index']);
$router->get('/bandas/{id}',[BandaController::class, 'show']);
$router->post('/bandas',[BandaController::class, 'store']);
$router->put('/bandas/{id}',[BandaController::class, 'update']);
$router->delete('/bandas/{id}',[BandaController::class, 'destroy']);

$router->get('/bandas/{id_banda}/discos',[DiscoController::class, 'show']);
$router->get('/discos',[DiscoController::class, 'index']);
$router->get('/discos/{id}',[DiscoController::class, 'index']);
$router->post('/bandas/discos',[DiscoController::class, 'store']);