<?php
/*
Realiza un programa que, usando una función, muestre la lista de todos los divisores de
un número inicializado en una variable o pasado como parámetro.
*/

function divisores($num){
    $arr = [];
    for ($i=1; $i <= $num; $i++) { 
        if ($num % $i == 0) {
            $arr[] = $i;
        }
    }
    return $arr;
}

$arr1 = divisores(4);

print_r($arr1);
?>