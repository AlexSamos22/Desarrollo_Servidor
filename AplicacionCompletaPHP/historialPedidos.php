<?php
include "funciones.php";
comprobar_sesion();

include "cabecera.php";

$historial = cargar_historial_pedidos($_SESSION['usuario'][3]);

if (!$historial) {
    echo "No ha hecho ningun pedido todavia<br>";
    echo "Haga uno!!!";
}else{
    echo "<h2>Historial Pedidos del usuario:". $_SESSION['usuario'][0]."</h2><br>";

    echo "<table style='border-collapse: collapse; width: 100%; text-align: center;'>";
    echo "<tr>";
    echo "<th style='border: 1px solid black; padding: 8px;'>ID del cliente</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>ID del pedido</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Producto comprado</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Unidades compradas</th>";
    echo "</tr>";
    foreach ($historial as $pedidos) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $pedidos['ID_Cliente'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $pedidos['ID_Pedido'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $pedidos['Nombre'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $pedidos['Unidades'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
}


?>