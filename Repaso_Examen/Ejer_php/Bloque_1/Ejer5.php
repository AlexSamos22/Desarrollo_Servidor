<?php
/*
Realiza un programa en el que haya una variable entera llamada año inicializada con
cualquier valor positivo. El programa mostrará por pantalla si el año guardado en dicha
variable es bisiesto. Ten en cuenta que un año es bisiesto cuando se cumple alguna de
estas dos condiciones:
a) Es múltiplo de 400
b) No es múltiplo de 400, pero es múltiplo de 4 y no es múltiplo de 100
*/

$year = 2012;

if ($year % 400 == 0) {
    echo "El año es bisiesto";
}else if($year % 4 == 0 and $year % 100 != 0){
    echo "El año es bisiesto";
}else{
    echo "El año no es bisiesto";
}

?>