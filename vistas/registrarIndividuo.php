<?php
include_once "controladores/ControladorIndividuo.php";
?>
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="post"> 
        <input type="text" name="nombre" placeholder="ingrese nombre">
        <input type="text" name="apellido" placeholder="ingrese apellido">
        <input type="text" name="direccion" placeholder="ingrese direcion">
        <input type="text" name="celular" placeholder="ingrese celular">
        <input type="text" name="ocupacion" placeholder="ingrese ocupacion">
        <input type="text" name="nacimiento" placeholder="ingrese fecha nacimiento">
        <input type="submit" name="submit" value="Guardar">
    </form>
    <?php
if(isset($_POST["submit"]))    {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $celular = $_POST["celular"];
    $ocupacion = $_POST["ocupacion"];
    $nacimiento = $_POST["nacimiento"];
    $controladorIndividuo = new ControladorIndividuo();
    echo $controladorIndividuo->guardar($nombre);
    echo $controladorIndividuo->guardar($apellido);
    echo $controladorIndividuo->guardar($direccion);
    echo $controladorIndividuo->guardar($celular);
    echo $controladorIndividuo->guardar($ocupacion);
    echo $controladorIndividuo->guardar($nacimiento);
}



