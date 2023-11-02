<?php
/*
Hacer un programa en el que haya una variable entera llamada dinero e inicializarla a
cualquier valor. El programa nos expresará esa cantidad en billetes de 500, 100, 50, 20
y 10 € y monedas de 2 y 1 €. Se ignoran los céntimos.
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