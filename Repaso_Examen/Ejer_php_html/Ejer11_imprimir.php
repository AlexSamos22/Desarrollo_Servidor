<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $medidasMatriz = $_POST['X'];
        $matriz = $_POST['dato'];
        $mediasFilas = 0;
        $medias = [];

        echo "La tabla final es la siguiente <br>";
        for ($i = 0; $i < count($matriz) ; $i++) { 
            for ($j = 0; $j < count($matriz[$i]) ; $j++) { 
                $mediasFilas += $matriz[$i][$j];
            }
            $medias[] = $mediasFilas / 3;
            $mediasFilas = 0;
        }

        echo "<table border='1'>";
            for ($i=0; $i < $medidasMatriz ; $i++) { 
                echo "<tr>";
                for ($j=0; $j < $medidasMatriz ; $j++) { 
                    echo "<td>".$matriz[$i][$j]."</td>";
                }
                echo "<td>".$medias[$i]."</td>";
                echo "</tr>";
            }
        echo "</table>";

}
?>