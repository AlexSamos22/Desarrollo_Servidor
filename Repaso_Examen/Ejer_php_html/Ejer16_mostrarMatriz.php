<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $medidasMatriz = $_POST['X'];
        $matriz = $_POST['dato'];
        $matrizInversa = [];

        echo "La matriz original es: <br>";
        echo "<table border='1'>";
        for ($i = 0; $i < count($matriz) ; $i++) { 
            echo "<tr>";
            for ($j = 0; $j < count($matriz[$i]) ; $j++) { 
                echo "<td>".$matriz[$i][$j]."</td>";
            }
                echo "</tr>";
        }
            echo "</table>";

        for ($i = count($matriz) - 1; $i >= 0 ; $i--) { 
            $matrizInversa [] = $matriz[$i]; 
        }
            
        echo "<br>";
        echo "La matriz inversa es: <br>";
        echo "<table border='1'>";
            for ($i=0; $i < count($matrizInversa) ; $i++) { 
                echo "<tr>";
                for ($j=0; $j < count($matrizInversa[$i]) ; $j++) { 
                    echo "<td>".$matrizInversa[$i][$j]."</td>";
                }
                echo "</tr>";
            }
        echo "</table>";

}
?>