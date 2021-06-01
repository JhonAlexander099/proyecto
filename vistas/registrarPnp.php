<?php
include_once "controladores/ControladorPnp.php";
?>
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="post"> 
        <input type="text" name="nombre" placeholder="ingrese nombre">
        <input type="text" name="apellido" placeholder="ingrese apellido">
        <input type="text" name="cip" placeholder="ingrese cip">
        <input type="text" name="correo" placeholder="ingrese correo">
        <input type="text" name="celular" placeholder="ingrese celular">
        <input type="submit" name="submit" value="Guardar">
    </form>
    <?php
if(isset($_POST["submit"]))    {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cip = $_POST["cip"];
    $correo = $_POST["correo"];
    $celular = $_POST["celular"];
    $controladorPnp = new ControladorPnp();
    echo $controladorPnp->guardar($nombre);
    echo $controladorIndividuo->guardar($apellido);
    echo $controladorIndividuo->guardar($cip);
    echo $controladorIndividuo->guardar($correo);
    echo $controladorIndividuo->guardar($celular);
}
