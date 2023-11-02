<?php
/*
Haz un programa que teniendo una variable con un número de DNI muestre la letra
que corresponde a dicho DNI, teniendo en cuenta que se obtiene así:
*Calculamos el resto de dividir el número de DNI entre 23
*Buscamos en la siguiente lista la letra que corresponde a dicho resto y esa será la
letra del DNI
*/

$listaLetrasDni = array(0 => "T", 1 => "R", 2 => "W", 3 => "A", 4 => "G", 
                        5 => "M", 6 => "Y", 7 => "F", 8 => "P", 9 => "D", 10 => "X", 
                        11 => "B", 12 => "N", 13 => "J", 14 => "Z", 15 => "S", 16 => "Q", 
                        17 => "V", 18 => "H", 19 => "L", 20 => "C", 21 => "K", 22 => "E",
                        23 => "T");

$numeroDNI = 77799767;
$sacarLetraDNI = $numeroDNI % 23;

echo "La letra que corresponde al DNI ". $numeroDNI. " es la ". $listaLetrasDni[$sacarLetraDNI];
?>