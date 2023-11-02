<?php
/*
Usando la función elevar al cuadrado realizada en la actividad 2.2, realizar un programa
que calcule la suma de los cuadrados de los números comprendidos entre 5 y 13
*/

include "C:/xampp/htdocs/Entorno_servidor/librerias/Potencia.php";

$result = 0;
for ($i=5; $i < 13 ; $i++) { 
    $result += potencia($i);
}

echo "La suma es $result";
?>