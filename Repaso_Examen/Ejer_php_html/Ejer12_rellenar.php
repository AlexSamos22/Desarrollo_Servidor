<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $filas = $_POST['N'];
    $columnas = $_POST['M'];

    echo "<form action='Ejer12_mostrar.php' method='post'>";
        for ($i=0; $i < $filas; $i++) { 
            for ($j=0; $j < $columnas; $j++) { 
                echo "<input type='number' name='dato[$i][$j]'>";
            }
            echo "<br>";
        }
        echo "<input type='submit'>";
        echo "<input type='hidden' name='N' value='$filas'>";
        echo "<input type='hidden' name='M' value='$columnas'>";
    echo "</form>";
}
?>