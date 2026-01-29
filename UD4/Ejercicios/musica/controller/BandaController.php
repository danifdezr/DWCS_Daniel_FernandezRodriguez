<?php

namespace Ejercicios\musica\controller;
use Ejercicios\musica\core\Request;
use Ejercicios\musica\model\BandaModel;
use Ejercicios\musica\model\vo\BandaVo;
use Ejercicios\musica\core\Response;
use Exception;

class BandaController{

    public function index()
    {
        try {
            $bandas = BandaModel::getBandas();
            $json = [];
            foreach ($bandas as $banda) {
                $json[] = $banda->toArray();
            }

            Response::json($json, 200);
        } catch (\Throwable $th) {
            error_log("BandaController->index() " . $th->getMessage());
            Response::serverError();
        }
    }

    public function show(int $id){
        $banda = BandaModel::getById($id);
        if(!isset($banda)){
            Response::notFound();
            return;
        }
        Response::json($banda->toArray(),200);
    }

    public function store(){
        try {
            $request = new Request();
            $data = $request->body();
            $banda = BandaVo::fromArray($data);
            $banda = BandaModel::addBanda($banda);
            if($banda === null){
                throw new Exception("No se ha agregado la banda ".implode(',',$data));
            }
            Response::json($banda->toArray(),201);
        } catch (\Throwable $th) {
            error_log("BandaController->store() " . $th->getMessage());
            Response::serverError();
        }
    }

    public function update(int $id){
        $request = new Request();
        $banda = BandaModel::getById($id);
        if(!isset($banda)){
            Response::notFound();
            return;
        }

        $banda->updateVoParams(BandaVo::fromArray($request->body()));

        $banda->setId($id);
        $banda = BandaModel::update($banda);
        Response::json($banda->toArray(),200);
    }

    public function destroy(int $id){
        if(BandaModel::delete($id)){
            Response::json(['mensaje'=> "Banda $id eliminada"], 200);
        }else{
            Response::notFound();
        }
    }
}