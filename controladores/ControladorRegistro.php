<?php

namespace controladores;
use clases\Registro;
include_once "config/autoload.php";
class ControladorRegistro
{
    public function guardar(String $codigo, int $numDocPrueba, String $tipoPrueba, String $medioTransporte, 
                            String $resultado, String $estadia): String{
        $control =  new Control();
        $control->setCodigo($codigo);
        $control->setNumDocPrueba($numDocPrueba);
        $control->setPrueba($tipoPrueba);
        $control->setMedioTransporte($medioTransporte);
        $control->setResultado($resultado);
        $control->setEstadia($estadia);
        
        if($control->guardar()!=0){
            $resultado = "Registro Guardado";
        } else{
            $resultado = "Registro no guardado";
        }
        
        return $resultado;
    }

    public function actualizar(String $codigoNuevo, int $numDocPruebaNuevo, String $tipoPruebaNuevo,
                               String $medioTransporteNuevo, String $resultadoNuevo, String $estadiaNuevo, int $id): string
    {
        $control =  new Control();
        $pnp->setId($id);
        $control->setCodigo($codigoNuevo);
        $control->setNumDocPrueba($numDocPruebaNuevo);
        $control->setPrueba($tipoPruebaNuevo);
        $control->setMedioTransporte($medioTransporteNuevo);
        $control->setResultado($resultadoNuevo);
        $control->setEstadia($estadiaNuevo);
        if($control->actualizar() !=0){
            $resultado = "Registro actualizado";
        }else { 
            $resultado = "Registro no actualizado";
        }
        return $resultado;
    }
}