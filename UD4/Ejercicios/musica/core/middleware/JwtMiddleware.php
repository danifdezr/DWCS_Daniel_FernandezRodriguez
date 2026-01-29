<?php

namespace Ejercicios\musica\core\middleware;
use Ejercicios\musica\core\Request;
use Ejemplos\escuelas\core\Response;
use Ejercicios\musica\model\UsuarioModel;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class JwtMiddleware implements Middleware{
    public function handle(Request $request){
        $token = $request->getHeader('Authorization');

        if(!isset($token)){
            Response::json(["messaje"=>"Usuario no autenticado."],401);
            return;
        }

        $token = str_replace('Bearer ','',$token);

        try {
            $payload = JWT::decode($token, new Key($this->secretKey,'HS256'));
            //$request->usuario = UsuarioModel::get($payload->sub);
        } catch (Exception $th) {
            Response::json(["messaje"=>"Usuario no autenticado."],401);
            exit;
        }
    }

    public function validateToken(){
        
    }
}