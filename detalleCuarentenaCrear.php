<?php

use config\Ayuda;
use controladores\ControladorCrontrol;
use controladores\ControladorDetalleCuarentena;

require_once "config/autoload.php";

Ayuda::autenticado();

require_once "public/layout/header.php";

$controladorControl = new ControladorControl();
$idVenta = $_REQUEST["id"];
?>
    <h2>Detalle Cuarentena</h2>
    <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
        <select class="form-control" name="Fecha">
            <?php
            $resultado = $controladorControl->mostrarTodo();
            foreach ($resultado as $control) {
                echo "<option value='" . $control["idCuarentena"] . "'>" . $control["nombre"] . "</option>";
            }
            ?>
        </select>
        <input class="form-control mt-2" type="number" name="dias">
        <input type="hidden" name="id" value="<?= $idFecha ?>">
        <div class="mt-2">
            <input class="btn btn-outline-success" type="submit" name="guardar" value="Guardar">
            <input class="btn btn-success" type="submit" name="finalizar" value="Finalizar">
        </div>
    </form>
<?php
if (isset($_POST["guardar"])) {
    $idControl = $_POST["control"];
    $dias = $_POST["dias"];
    $controladorDetalleControl = new ControladorDetalleControl();
    $controladorDetalleControl->guardar($idControl, $idFecha, $dias);
    $resultado = $controladorDetalleControl->mostrar($id);

    echo "<table class='table'><tr>
                <th>IdControl</th>
                <th>Fecha</th>
                <th>Dias</th>
              </tr>";
    $total = 0;
    foreach ($resultado as $dv) {
        $parcial = (float)$dv["dias"] * (float)$dv["fecha"];
        echo "<tr>
                <td>" . $dv["nombre"] . "</td>
                <td>S/. " . $dv["fecha"] . "</td>
                <td>" . $dv["dias"] . "</td>
        $total += $parcial;
    }
    echo "<tr>
            <th colspan='3'>Total</th>
            <td><h5>S/. $total</h5></td>
          </tr>";
    echo "</table>";
}
require_once "public/layout/footer.php";

if (isset($_POST["finalizar"])) {
    header("location: bienvenido.php");
}