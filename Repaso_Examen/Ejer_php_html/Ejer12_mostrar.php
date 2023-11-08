<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $filas = $_POST['N'];
    $columnas = $_POST['M'];
    $matriz = $_POST['dato'];

    echo "<table border = '1'>";
    for ($i=0; $i < $filas ; $i++) {
        $sumaFilas = 0;
        echo "<tr>";
        for ($j=0; $j < $columnas ; $j++) { 
            echo "<td>".$matriz[$i][$j]."</td>";
            $sumaFilas += $matriz[$i][$j];
        }
        echo "<td>".$sumaFilas."</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>