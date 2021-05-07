<?php

namespace controladores;

use clases\Usuario;

class ControladorUsuario
{
    public function login(int $correo, string $password): void
    {
        $usuario = new Usuario();
        $usuario ->getCorreo($correo);
        $query = $usuario->mostrarPorCorreo();
        if ($query->rowCount() != 1) {
            echo "Usuario y/o Contraseña incorrecto";
        } else {
            $datos = $query->fetchAll();
            foreach ($datos as $user) {
                $passwordBD = $user["contraseña"];
                $nombres = $user["nombres"];
                $tipo = $user["tipo"];

            }
            if (password_verify($password, $passwordBD)) {
                session_start();
                $_SESSION["nombre"] = $nombres;
                $_SESSION["tipo"] = $tipo;
                $_SESSION["estado"] = "ok";
                header("Location: index.php?bienvenido");
            } else {
                echo "Usuario y/o Contraseña incorrecto";
            }
        }
    }

}