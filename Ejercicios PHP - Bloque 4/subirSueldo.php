<?php
    include "Persona.php";

    function subirSueldo(Persona $persona1, $porcentaje){
        if($porcentaje<=0){
            throw new Exception("El porcentaje ha sido incorrecto<br>");

        }else{
           $nuevoSueldo = $persona1 ->getSueldo() + ($persona1 ->getSueldo() * ($porcentaje/100));
        }
        return "El nuevo sueldo del trabajador ". $persona1->getNombre()." es: $nuevoSueldo";
    }


 try {
    $dni3 = new DNI(14273069);
    $persona3 = new Persona("Alex", $dni3, "22", 1200);
    echo subirSueldo($persona3, 10);
 } catch (Exception $e) {
    echo $e->getMessage();
 }
?>