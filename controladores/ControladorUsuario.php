<?php

namespace controladores;
use clases\Usuario;
include_once "config/autoload.php";
class ControladorUsuario
{
    public function login(String $user, string $pass)
    {
        $usuario = new Usuario();
        $datos = $usuario->datos_login($user);
        if($datos!=null){
            $passbd = null;
            foreach ($datos as $datosbd){
                $passbd = $datosbd["contraseña"];
            }
            if(password_verify($pass, $passbd)){
                session_start();
                $_SESSION["autenticado"] = 1;
                header( "location: index.php?bienvenido");
                 
            }else{    
                echo "usuario o password no encontrados";           
            }
        }else{
            echo "usuario o password no encontrados";
        }
    }

    public function guardar(String $user, String $pass)
    {
        $usuario = new Usuario();
        $usuario->setCodigo($user);
        $usuario->setPassword(password_hash($pass, PASSWORD_DEFAULT)); /*aca marca error linea 31*/
        $usuario->guardar();
        return "Usuario Guardado";
    }
}


