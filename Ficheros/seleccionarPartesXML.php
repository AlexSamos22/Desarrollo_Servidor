<?php
    $datos = simplexml_load_file("empleados.xml");
    $edades = $datos->xpath("//edad");
    foreach ($edades as $value) {
        print_r($value);
        echo "<br>";
    }
?>