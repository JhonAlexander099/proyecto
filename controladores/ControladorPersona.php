<?php

namespace controladores;
use clases\Persona;
include_once "config/autoload.php";
class ControladorPersona
{
    public function mostrar(){
        $individuos = new Individuo();
        return $individuos -> mostrar;
    }

    public function mostrarPorId(int $id){
        $individuos =  new Individuo();
        $resultado = $individuos->mostrar($id);
        foreach ($resultado as $individuos){
            $nombre = $individuos["nombre"]; 
        }
        return $nombre;
    }

    public function guardar(String $nombre, String $apellido, int $celular, String $correo, String $ocupacion): String{
        $individuos =  new Individuo();
        $individuos->setNombre($nombre);
        $individuos->setApellido($apellido);
        $individuos->setCelular($celular);
        $individuos->setCorreo($correo);
        $individuos->setOcupacion($ocupacion);
        
        if($individuos->guardar()!=0){
            $resultado = "Individuo Guardado";
        } else{
            $resultado = "Individuo no guardado";
        }
        
        return $resultado;
    }

    public function actualizar(string $nombreNuevo, String $apellidoNuevo, int $celularNuevo,
                               String $correoNuevo, String $ocupacionNuevo, int $id): string
    {
        $individuos =  new Individuo();
        $individuos->setId($id);
        $individuos->setNombre($nombreNuevo);
        $individuos->setApellido($apellidoNuevo);
        $individuos->setCelular($celularNuevo);
        $individuos->setCorreo($correoNuevo);
        $individuos->setOcupacion($ocupacionNuevo);
        if($individuos->actualizar() !=0){
            $resultado = "Individuo actualizado";
        }else { 
            $resultado = "Individuo no actualizado";
        }
        return $resultado;
    }
}