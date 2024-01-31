<?php
include "bd.php";

if (!comprobar_sesion()) {
    return;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $codigoProducto = $_POST['codigo'];
    $unidades = $_POST['stock'];
    $codigoAdmin = $_SESSION['admin'][3];


    $anadido = anadirStock($codigoAdmin, $codigoProducto, $unidades);

    if ($anadido) {
        echo "TRUE";
    }else{
        echo "FALSE";
    }
}
?>