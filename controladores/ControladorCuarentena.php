<?php


namespace controladores;


use clases\Cuarentena;

class ControladorCuarentena
{
    public function guardar($fecha)
    {
        $id = $_SESSION["id"];
        $cuarentena = new Cuarentena($fecha, $id);
        $idCuarentena = $cuarentena->crear();
        if ($idCuarentena != 0) {
            header ("location: CuarentenaCrear.php?id=$idCuarentena");
        } else {
            return "No se guardó";
        }

    }
}