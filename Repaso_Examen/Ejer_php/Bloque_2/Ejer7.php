<?php
/*
Recorrer una lista, inicializada con valores numéricos, con un blucle cambiando su
valor por el doble y después volver a recorrerla con otro bucle imprimiendo resultado de
la operación anterior.
*/

$arr = [3,5,6,7,8,9,1,2,3];

foreach ($arr as &$value) {
   $value *= 2; 
}

foreach ($arr as $value) {
    echo $value. "<br>";
}
?>