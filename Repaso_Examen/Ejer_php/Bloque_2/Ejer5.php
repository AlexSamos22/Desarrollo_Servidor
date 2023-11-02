<?php
/*
Realiza un programa que, con una cadena inicializada, muestre cada una de las palabras
en una línea diferente. Para la realización de este ejercicio se debe recorrer la cadena
analizando cada palabra, no se puede usar el comando explode.
*/

$cadena = "Cadena de prueba";

$cadenaSeparada = "";
$numeroPalabras = 1;

for ($i = 0 ; $i < strlen($cadena) ; $i++) { 
    if ($cadena[$i] != " ") {
        $cadenaSeparada.=$cadena[$i];
    }else{
        $cadenaSeparada.= "<br>";
        $numeroPalabras ++;
    }
}
echo "Numero de palabras ". $numeroPalabras. "<br>";
echo $cadenaSeparada;
?>