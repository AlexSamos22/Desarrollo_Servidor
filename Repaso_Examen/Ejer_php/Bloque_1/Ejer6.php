<?php
/*
Hacer un programa en el que haya una variable entera llamada dinero e inicializarla a
cualquier valor. El programa nos expresará esa cantidad en billetes de 500, 100, 50, 20
y 10 € y monedas de 2 y 1 €. Se ignoran los céntimos.
*/

$cifra = 3459;
if (intval($cifra/500) >0) {
    echo "Billetes de 500  ". intval($cifra/500);
    $cifra = $cifra % 500;
}
if (intval($cifra/100) >0) {
    echo "Billetes de 100  ". intval($cifra/100);
    $cifra = $cifra % 100;
}
if (intval($cifra/50) >0) {
    echo "Billetes de 50  ". intval($cifra/50);
    $cifra = $cifra % 50;
}
if (intval($cifra/20) >0) {
    echo "Billetes de 20  ". intval($cifra/20);
    $cifra = $cifra % 20;
}
if (intval($cifra/10) >0) {
    echo "Billetes de 10  ". intval($cifra/10);
    $cifra = $cifra % 10;
}
if (intval($cifra/2) >0) {
    echo "Monedas de 2  ". intval($cifra/1);
    $cifra = $cifra % 2;
}
if (intval($cifra/1) >0) {
    echo "Monedas de 1  ". intval($cifra/1);
    $cifra = $cifra % 1;
}

?>