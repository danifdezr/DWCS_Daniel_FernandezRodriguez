<?php

namespace Ejercicios\ejercicio4_2\controller;

use Ejercicios\ejercicio4_2\core\Request;
use Ejercicios\ejercicio4_2\core\Response;
use Ejercicios\ejercicio4_2\model\CasaModel;
use Ejercicios\ejercicio4_2\model\SensorModel;
use Ejercicios\ejercicio4_2\model\vo\SensorVo;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;

class SensorController extends Controller{
    
    public function store(){
        $this->request->validate([
            "mac" => "string|max:17:required",
            "localizacion" => "string|max:50|required"
        ]);

        $data = $this->request->body();
        $casa = CasaModel::get($this->request->usuario->getCasaId());
        if(!isset($casa)){
            Response::json(['message' => 'Error al añadir sensor'], 401);
            return;
        }

        $sensor = SensorVo::fromArray($data);
        $sensor->setCasaId($casa->getId());
        SensorModel::add($sensor);

        if(!isset($sensor)){
            Response::json(['message' => 'Error al crear sensor'], 401);
            return;
        }
        $token = self::createJwt($sensor, 3600);
        return Response::json(['TokenSensor' => $token, 'Sensor' => $sensor->toArray()], 200);
        /* return Response::json(['Usuario' => $this->request->usuario->toArray()], 200); */
    }

    public function show(){
        $casa_id = CasaModel::get($this->request->usuario->getCasaId())->getId();
        $sensores = SensorModel::getByCasaId($casa_id);

        if(!isset($sensores)){
            Response::json(["message" => "Error al obtener sensores"], 401);
            return;
        }
        $sensores = SensorModel::getByCasaId($casa_id);
        $result = [];
        foreach($sensores as $s){
            $result[] = $s->toArray();
        }
        Response::json(['Sensor' => $result], 200);
    }

    private function createJwt(SensorVo $vo, $expireSeconds){
        $payload = [
            "sub" => $vo->getMac(),
            "casa" => $vo->getCasaId(),
            "iat" => time(),
            "exp" => time() + $expireSeconds,
            "role" => "sensor"
        ];

        $jwt = JWT::encode($payload, $_ENV['JWT_SECRET_KEY'], $_ENV['JWT_ALGO']);

        return $jwt;
    }
}