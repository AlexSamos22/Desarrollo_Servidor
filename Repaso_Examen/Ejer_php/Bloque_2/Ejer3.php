<?php
/*
Realiza un programa que, con una cadena definida en una variable, nos muestre esa
cadena en una línea diferente para cada palabra y nos muestre el número total de
palabras encontradas.
*/

$cadena = "Cadena de prueba";

$cadenaSeparada = explode(" ", $cadena);

$numeroLetras = count($cadenaSeparada);

echo "El numero de palabras es: ". $numeroLetras . "<br>";

foreach ($cadenaSeparada as $value) {
    echo $value. "<br>";
}
?>