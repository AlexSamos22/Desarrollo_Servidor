<?php
    $cadena = "Hola que tal estas ?";
    $numPalabras = 0;
   $cadenaSeparada = explode(" ", $cadena);

    foreach ($cadenaSeparada as $value) {
        echo $value."<br>";
        $numPalabras ++;
    }

    echo "El numero de palabras encontradas es: $numPalabras";


?>