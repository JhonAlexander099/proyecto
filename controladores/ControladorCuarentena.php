<?php

namespace Controladores;

use Clases\Cuarentena;

class ControladorCuarentena
{

    function mostrarCuarentena(){
        $guardarCuarentena= new Cuarentena();
        return $guardarCuarentena->mostrarCuarentena();
    }

    function ActualizarCuarentena(array $datos){

        $a= new Cuarentena();
        $a->setcontrolid($datos['id']);
        $a->setdescripcion($datos['descripcion']);
        $a->ActualizarCuarentena();

    }

    function BuscarIdC($id){
        $vehi= new Cuarentena();
        return $vehi->BuscarIdC($id);
    }

}