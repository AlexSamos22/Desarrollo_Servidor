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

$numero = "12346";
$numeroPremiado = "16786";

if ($numero == $numeroPremiado) {
    echo "Ganador";
}else if($numero[0] == $numeroPremiado[0] and $numero[4] == $numeroPremiado[4]){
    echo "Tiene reintegro";
}else{
    echo "No premiado";
}

?>