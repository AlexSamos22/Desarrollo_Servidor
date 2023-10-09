<?php
    // == si son iguales si aun haciendo una cobversion el numero es el mismo
    // === si son identicos si son del mismp tipo e iguales sin tener que hacer conversion
    $a = 3;
    $b = "3";
    if ($a == $b) {
        echo  "Son iguales <br>";
    }else{
        echo "No son iguales";
    }

    if ($a === $b) {
        echo "Son identicos <br>";
    }else{
        echo "No son identicos <br>";
    }
?>