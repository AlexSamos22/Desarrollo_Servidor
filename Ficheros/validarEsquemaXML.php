<?php
    $dept = new DOMDocument();
    $dept->load('empleados.xml');
    $res = $dept->schemaValidate('departamento.xsd');
    if ($res) {
        echo "El fichero es valido";
    }else{
        echo "Fichero no valido";
    }
?>