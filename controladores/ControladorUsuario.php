<?php

namespace controladores;
use clases\Usuario;
require_once "config/autoload.php";
class ControladorUsuario
{
    public function login($username, $password){
        $usuario = new Usuario($username, $password);

                session_start();
                $_SESSION["usuario"] = $username;
                
                $_SESSION["tipo"] = "dispensador";
                header("location: bienvenido.php");

}

    public function guardar($username, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $usuario = new Usuario($username, $password);
        if ($usuario->crear() != 0) {
            header("location: index.php?s");
        } else {
            header("location: usuarioCrear.php?s");
        }

    }   
}