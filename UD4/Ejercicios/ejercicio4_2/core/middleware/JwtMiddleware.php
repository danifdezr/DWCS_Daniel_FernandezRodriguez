<?php

namespace Ejercicios\ejercicio4_2\core\middleware;

use Ejercicios\ejercicio4_2\core\middleware\Middleware;
use Ejercicios\ejercicio4_2\core\Request;
use Ejercicios\ejercicio4_2\core\Response;
use Ejercicios\Ejercicio4_2\model\UsuarioModel;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtMiddleware implements Middleware{
    public function handle(Request &$request){
        $token = $request->getHeader('Authorization');

        if(!isset($token)){
            Response::json(['message' => 'Usuario no autenticado'], 401);
            exit;
        }

        $token = str_replace('Bearer', '', $token);

        try{
            $payload = JWT::decode($token, new Key($_ENV('JWT_SECRET_KEY'), $_ENV('JWT_ALGO')));
            $request->usuario = UsuarioModel::get($payload->sub);
        }catch(Exception $th){
            Response::json(['message' => 'Usuario no autenticado'], 401);
            exit;
        }
    }
}