<?php
include "Persona.php";

function esMayorEdad(Persona $persona1, Persona $persona2){
    if ($persona1->getEdad()>$persona2->getEdad()) {
        return $persona1->getNombre()." es el mayor<br>";
    }else{
        return $persona2->getNombre()." es el mayor<br>";
    }
}
$dni1 = new DNI(77558899);
$dni2 = new DNI(77021250);
$persona1 = new Persona("Antonio", $dni1, 21, 2000);
$persona2 = new Persona("Antonio V", $dni2, 26, 10000);

echo esMayorEdad($persona1, $persona2)."<br>";


?>