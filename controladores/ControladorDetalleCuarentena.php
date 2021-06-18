<?php
namespace controladores;

use clases\DetalleCuarentena;

require_once "config/autoload.php";

class ControladorDetalleCuarentena
{
    public function guardar($id, $fecha_inicio, $fecha_final, $descripcion){
        $detalleCuarentena = new DetalleCuarentena($id, $fecha_inicio, $fecha_final, $descripcion);
        return $detalleCuarentena->guardar();
    }

    public function mostrar($id){
        return DetalleCuarentena::mostrar($id);
    }
}