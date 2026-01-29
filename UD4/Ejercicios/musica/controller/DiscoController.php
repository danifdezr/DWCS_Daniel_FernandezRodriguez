<?php

namespace Ejercicios\musica\controller;

use Ejercicios\musica\core\Request;
use Ejercicios\musica\model\DiscoModel;
use Ejercicios\musica\model\vo\DiscoVo;
use Ejercicios\musica\core\Response;

class DiscoController{

    public function index(){
        $discos = DiscoModel::getDisco();
        $json = [];
        foreach($discos as $disco){
            $json[] = $disco->toArray();
        }

        Response::json($json, 200);
    }

    public function show($id_banda){
        $discos = DiscoModel::getByIdBanda($id_banda);
        if(!isset($discos)){
            Response::notFound();
            return;
        }
        $discosJson = [];
        foreach($discos as $d){
            $discosJson[] = $d->toArray();
        }
        Response::json($discosJson,200);
    }

    public function showDisco($id){
        $disco = DiscoModel::getById($id);
        if(!isset($disco)){
            Response::notFound();
            return;
        }
        Response::json($disco->toArray(),200);
    }

    public function store(){
        $request = new Request();
        $disco = DiscoVo::fromArray($request->body());
        $disco = DiscoModel::addDisco($disco);
        Response::json($disco->toArray(),201);
    }

    public function update(int $id){
        $request = new Request();
        $disco = DiscoModel::getById($id);
        if(!isset($disco)){
            Response::notFound();
            return;
        }

        $disco->updateVoParams(vo: DiscoVo::fromArray($request->body()));

        $disco->setId($id);
        $banda = DiscoModel::update($disco);
        Response::json($disco->toArray(),200);
    }

}