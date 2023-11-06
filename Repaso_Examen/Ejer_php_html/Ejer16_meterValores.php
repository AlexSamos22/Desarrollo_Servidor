<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['X'])) {
        $medidasMatriz = $_POST['X'];
        echo "Introduce los valores para la matriz de $medidasMatriz X $medidasMatriz <br>";
        
        echo "<form method='post' action='Ejer16_mostrarMatriz.php'>";
        echo "<table border='1'>";
            for ($i = 0; $i < $medidasMatriz ; $i++) { 
                echo "<tr>";
                for ($j = 0; $j < $medidasMatriz ; $j++) { 
                    echo "<td><input name='dato[$i][$j]' type='number'></td>";
                }
                echo "</tr>";
            }
        echo "</table>";
        echo "<input type='submit'>";
        echo "<input name='X' type='hidden' value='$medidasMatriz'>";
        echo "</form>";
    }
}
?>