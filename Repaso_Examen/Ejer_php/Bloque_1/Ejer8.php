<?php
/*
Realiza un programa que genere números enteros aleatorios entre 0 y 10 y los muestre
por pantalla, el programa terminará cuando el número sea 10.
*/

do{
    $numero = rand(0, 10);
    echo $numero;
}while($numero != 10);

?>