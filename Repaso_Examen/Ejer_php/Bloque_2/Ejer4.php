<?php
/*
Escribe una función que reciba como parámetro una cadena y devuelva si es un
palíndromo.
*/

$cadena = "Dabale arroz a la zorra el abad";

$cadenaInvertida = str_replace(" ", "", strtolower(strrev($cadena)));

if (str_replace(" ", "", strtolower($cadena)) == $cadenaInvertida) {
    echo "es un palindromo";
}else{
    echo "no es un palindromo";
}
?>