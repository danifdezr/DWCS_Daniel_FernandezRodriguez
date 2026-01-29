<?php
namespace Ejercicios\musica\core\middleware;
use Ejercicios\musica\core\Request;
use Ejercicios\musica\core\middleware\Middleware;

class LogMiddleware implements Middleware{
    public function handle(Request $request){
       error_log("Acceso capturado".$request->uri());  
    }
}