<?php

include_once "vistas/layout/header_sistema.php";
session_start();
if(!isset($_SESSION["autenticado"])){
    header("location: index.php?login");
}

?>
<h1>Bienvenidos</h1>
<a href="?logout">logout</a>
<?php
include_once "vistas/layout/footer.php";