<?php
include "funciones.php";

comprobar_sesion();

include "cabecera.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $codigoProducto = $_POST['cod'];
    $unidades = $_POST['unidades'];
    $codigoAdmin = $_SESSION['admin'][3];


    $anadido = anadirStock($codigoAdmin, $codigoProducto, $unidades);

    if ($anadido) {
        echo "Stock añadido correctamente";
    }else{
        echo "Ha ocurrido algun error";
    }

}
?>