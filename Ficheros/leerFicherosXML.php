<?php
    $datos = simplexml_load_file("empleados.xml");
    echo "<br>";
    if ($datos == false) {
        echo "Error al leer el fichero";
    }

    foreach ($datos as $value) {
        print_r($value);
        echo "<br>";
    }
?>