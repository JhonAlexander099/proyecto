<?php

include_once "config/autoload.php";

$controladorIndividuo = new ControladorIndividuo();
$resultado = $controladorIndividuo->mostrar();

echo "<table>";
foreach ($resultado as $individuo) {
    echo "<tr>" .
            "<td>" . $individuo["nombres"] . "</td>
          </tr>";
}
echo "</table>";

