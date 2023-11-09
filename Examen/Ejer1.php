<?php
/*
EJERCICIO 1 (2,5 puntos): Realizar un programa que, teniendo dos
cadenas inicializadas, nos diga cuantas veces se repite la segunda cadena
dentro de la primera.
Ejemplo: frase1: “No hay nada como un gol del Granada”
 frase2: ”ada”
La frase 2 se repite 2 veces en la frase 1
*/

$cadena1 = "No hay nada como un gol del Granada";
$cadena = "ada";
$array = explode(" ", $cadena1);
$contador= 0;
for ($i=0; $i < count($array) ; $i++) { 
    $c = $array[$i];
    if (strpos($c, $cadena) >= 0 and !is_bool(strpos($c, $cadena))) {
        $contador++;
    }
}
echo "La palabra $cadena se repite ". $contador. " veces en la cadena $cadena1";
?>