<?php

namespace Ejercicios\musica\controller;
use Ejercicios\musica\core\Request;
use Ejercicios\musica\model\BandaModel;
use Ejercicios\musica\model\vo\BandaVo;
use Ejercicios\musica\core\Response;

class BandaController{

    public function index(){
        $bandas = BandaModel::getBandas();
        $json = [];
        foreach($bandas as $banda){
            $json[] = $banda->toArray();
        }

        Response::json($json, 200);
    }

    public function store(){
        $request = new Request();
        $banda = BandaVo::fromArray($request->body());
        $banda = BandaModel::addBanda($banda);
        Response::json($banda->toArray(),201);
    }

    public function destroy(int $id){
        if(BandaModel::delete($id)){
            Response::json(['mensaje'=> "Banda $id eliminada"], 200);
        }else{
            Response::notFound();
        }
    }
}