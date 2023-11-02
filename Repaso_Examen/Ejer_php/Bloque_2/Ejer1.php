<?php
/*
Realiza un programa que cree una lista de 5 palabras. El programa deberá mostrar por
pantalla el número de palabras de la lista, la primera y la última de ellas. El programa
deberá estar hecho con fácil mantenimiento (esto es que si ampliamos o disminuimos
el número de palabras de la lista no debemos tocar nada más en las restantes líneas
del programa).
*/
$palabras = ["Hola", "que", "tal", "estas", "?"];

$numeroPalabras = count($palabras);
echo "La primera palabra es: ". $palabras[0];
echo "La ultima palabra es: ". $palabras[$numeroPalabras-1];

?>