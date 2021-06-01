<?php

include_once "config/autoload.php";

$controladorRegistro = new ControladorRegistro();
$resultado = $controladorRegistro->mostrar();

echo "<table>";
foreach ($resultado as $control) {
    echo "<tr>" .
            "<td>" . $control["codigo"] . "</td>
          </tr>";
}
echo "</table>";

