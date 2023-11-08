<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $eleccion = $_POST['conversion'];
    
    if ($eleccion == "binario") {
        echo "Introduce un numero en binario";
        echo "<form action='Ejer2_conBinario.php' method='post'>";
                echo "<input name='binario' type='text'>";
                echo "<input type='submit'>";
        echo "</form>";
    }else{
        echo "Introduce un numero en decimal";
        echo "<form action='Ejer2_conDecimal.php' method='post'>";
                echo "<input name='decimal' type='number'>";
                echo "<input type='submit'>";
        echo "</form>";
    }
}
?>