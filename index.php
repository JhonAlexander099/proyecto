<?php

$ruta = strtolower($_SERVER["QUERY_STRING"]);
switch($ruta){
    case "login": 
        include_once "vistas/usuarioLogin.php";
        break;
    case "registrar-usuario": 
        include_once "vistas/usuarioCrear.php";
        break;
    case "bienvenido": 
        include_once "vistas/bienvenido.php";
        break; 
    case "logout":
        include_once "vistas/logout.php";
        break;       
    default:
        include_once "vistas/404.php";
}