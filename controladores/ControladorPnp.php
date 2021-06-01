<?php

namespace controladores;
use clases\Pnp;
include_once "config/autoload.php";
class ControladorPnp
{
    public function guardar(String $nombre, String $apellido, int $cip, String $correo, int $celular): String{
        $pnp =  new Pnp();
        $pnp->setNombre($nombre);
        $pnp->setApellido($apellido);
        $pnp->setCip($cip);
        $pnp->setCorreo($correo);
        $pnp->setCelular($celular);
        
        if($pnp->guardar()!=0){
            $resultado = "Policia Guardado";
        } else{
            $resultado = "Policia no guardado";
        }
        
        return $resultado;
    }

    public function actualizar(String $nombreNuevo, String $apellidoNuevo, int $cipNuevo,
                               String $correoNuevo, int $celularNuevo, int $id): string
    {
        $pnp =  new Pnp();
        $pnp->setId($id);
        $pnp->setNombre($nombreNuevo);
        $pnp->setApellido($apellidoNuevo);
        $pnp->setCip($cipNuevo);
        $pnp->setCorreo($correoNuevo);
        $pnp->setCelular($celularNuevo);
        if($pnp->actualizar() !=0){
            $resultado = "Policia actualizado";
        }else { 
            $resultado = "Policia no actualizado";
        }
        return $resultado;
    }

    public function eliminar(int $id): String{
        $pnp =  new Pnp();
        $pnp->setId($id);
        if($pnp->eliminar()!=0){
            $resultado = "Policia Eliminado";
        } else{
            $resultado = "Policia no Eliminado";
        }
        
        return $resultado;
    }
}