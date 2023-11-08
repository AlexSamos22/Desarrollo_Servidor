<?php
/*
Estamos haciendo un programa de loterías y tenemos dos variables llamadas número y
NúmeroPremiado, que se encuentran inicializadas con números de 5 cifras. El
programa deberá mostrar por pantalla:
a) Si el número coincide con el número premiado.
b) Si el número tiene reintegro, es decir, se dan a la vez las dos siguientes condiciones:
a. La primera cifra del número coincide con la primera cifra del número premiado
b. La última cifra del número coincide con la última cifra del número premiado
*/

$premio = "10001";
$boleto = "10201";

if ($premio == $boleto) {
    echo "premiado";
}else{
    $primeraCifraNumero = $numero[0];
    $ultimaCifraNumero = $numero[strlen($numero) - 1];
    $primeraCifraPremiado = $numeroPremiado[0];
    $ultimaCifraPremiado = $numeroPremiado[strlen($numeroPremiado) - 1];
    if ($primeraCifraNumero === $primeraCifraPremiado && $ultimaCifraNumero === $ultimaCifraPremiado) {
        echo "¡Tienes reintegro!";
    } else {
        echo "No tienes reintegro.";
    }
}
?>