<?php

use Includes\ConexionBD;
use Clases\Historial; 
include_once "includes/autoload.php";

session_start();


$request = $_SERVER['QUERY_STRING'];
switch ($request) {
    
    case "bienvenido":
       $objHistorial = new Historial();
        include_once "vistas/bienvenido.php";
        break;
    case "crear-usuarios":
        include_once "vistas/usuarioCrear.php";
        break;
    case "registrar-personas":
        include_once "vistas/registrarPersona.php";
        break;
    case "registrar-pnp":
        include_once "vistas/registrarPnp.php";
        break;
    case "registrar-control":
        include_once "controlCovid.php";
        break;
    case "mostrar-historial":
        include_once "vistas/mostrarHistorial.php";
        break;
    case "mostrar-cuarentena":
        include_once "vistas/mostraruarentena.php";
        break;
    case "mostrar-prueba":
        include_once "vistas/mostrarPrueba.php";
        break;
    
    case "login":
        include_once "vistas/ususarioLogin.php";
        break;
    case 'cerrar':
        session_start();
        session_destroy();
        header('location: cerrado');
        break;
    case "guardar-usuario":
        include_once "vistas/usuarioCrear.php";
        break;
    case "validar":
        $codigo = $_POST["correo"];
        $controladorUsuario = new ControladorUsuario();
        $controladorUsuario->validar($codigo);
        break;
    case "api/personas":
          
        break;

    default:

        include_once "vistas/usuarioLogin.php";
        
        break;

}