<?php
use config\Ayuda;
use controladores\ControladorCuarentena;
include_once "config/autoload.php";

Ayuda::autenticado();

require_once "public/layout/header.php";

if(!isset($_POST["Cuarentena"])){
?>
    <h1>Registrar Fecha</h1>
    <form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
        <input class="btn btn-success" type="submit" name="submit" value="Registrar Fecha">
        <input type="hidden" name="fechaInicio" value="FechaFinal">
    </form>
<?php
}
if(isset($_POST["Fecha"])){
    date_default_timezone_set("america/lima");
    $fecha = date("Y-m-d");
    $controladorCuarentena = new ControladorCuarentena();
    echo $controladorCuarentena->guardar($fecha);
}
require_once "public/layout/footer.php";