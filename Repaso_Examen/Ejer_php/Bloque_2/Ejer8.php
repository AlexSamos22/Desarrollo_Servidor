<?php
/*
Crear una lista con los siguientes valores:
"DE"=>"Berlín", "DK" =>"Copenhage", "ES" =>"Madrid"
y en función del valor de una variable nos muestre por pantalla a qué país pertenece la
capital del código que contiene la variable.
*/

$paises = ["DE"=>"Berlín", "DK" =>"Copenhage", "ES" =>"Madrid"];

$codPais = "DE";

foreach ($paises as $key => $value) {
    if ($key == $codPais) {
        echo "El codigo introducido pertenece al pais". $value;
    }
}

?>