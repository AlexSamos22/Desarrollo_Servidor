<?php
/*
Realiza un programa que, llamando a una función, nos muestre si el número aleatorio
inicializado en una variable es primo o no.
*/

$numAleatorio = rand(1, 10);

function numPrimo($num){
    $contador = 0;
    for ($i=1; $i <= 10 ; $i++) { 
        if ($num % $i == 0) {
            $contador++;
        }
    }

    if ($contador == 2) {
        return "El numero es primo";
    }else{
        return "El numero no es primo";
    }
}

echo $numAleatorio."<br>";
echo numPrimo($numAleatorio);
?>