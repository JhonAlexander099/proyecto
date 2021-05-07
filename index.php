<?php

include_once "config/autoload.php";
session_start();
echo 'Proyecto';
$request = $_SERVER['QUERY_STRING'];
switch ($request) {
    //get
    case "bienvenido":
        include_once "vistas/bienvenido.php";
        break;
    case "crear-usuarios":
        include_once "vistas/usuarioCrear.php";
        break;
    case "registrar-individuos":
        include_once "vistas/registrarIndividuo.php";
        break;
    case "registrar-pnp":
        include_once "vistas/registrarPnp.php";
        break;
    case "mostrar-historial":
        include_once "vistas/mostrarHistorial.php";
        break;
    case "mostrar-cuarentena":
        include_once "vistas/mostrarCuarentena.php";
        break;
    case "mostrar-prueba":
        include_once "vistas/mostrarPrueba.php";
        break;
    //post
    case "login":
        include_once "vistas/usuarioLogin.php";
        break;
    case "guardar-usuario":
        include_once "vistas/usuarioCrear.php";
        break;
    case "validar":
        $codigo = $_POST["correo"];
        $controladorUsuario = new ControladorUsuario();
        $controladorUsuario->validar($codigo);
        break;
    
    default:
        include_once "vistas/usuarioLogin.php";
        break;
}