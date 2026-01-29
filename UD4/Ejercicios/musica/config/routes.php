<?php

use Ejercicios\musica\controller\DiscoController;
use Ejercicios\musica\core\middleware\LogMiddleware;
use Ejercicios\musica\core\Router;
use Ejercicios\musica\controller\BandaController;
use Ejercicios\musica\controller\AuthController;

/* ENDPOINTS BANDAS */

//Ver bandas
$router->get('/bandas',[BandaController::class, 'index'], [LogMiddleware::class]);
//Ver banda por id
$router->get('/bandas/{id}',[BandaController::class, 'show']);
//Añadir una banda
$router->post('/bandas',[BandaController::class, 'store']);
//Modificar una banda por id
$router->put('/bandas/{id}',[BandaController::class, 'update']);
//Eliminar una banda por id
$router->delete('/bandas/{id}',[BandaController::class, 'destroy']);


/* ENDPOINTS DISCOS */

//Ver discos de una banda 
$router->get('/bandas/{id_banda}/discos',[DiscoController::class, 'show']);
//Ver todos los discos
$router->get('/discos',[DiscoController::class, 'index']);
//Ver un disco determinado
$router->get('/discos/{id}',[DiscoController::class, 'showDisco']);
//Añadir un disco a una banda
$router->post('/bandas/discos',[DiscoController::class, 'store']);
//Modificar un disco
$router->put('/discos/{id}',[DiscoController::class, 'update']);
//Eliminar un disco

//Endpoints Auth
$router->post('/login',[AuthController::class, 'login']);
$router->post('/register',[AuthController::class, 'register']);
$router->get('/autenticado',[AuthController::class, 'validateToken']);
