<?php
include "bd.php";

if (!comprobar_sesion()) {
    return;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $codigoProducto = $_POST['cod'];
    $unidades = $_POST['unidades'];
    $codigoAdmin = $_SESSION['admin'][3];


    $anadido = anadirStock($codigoAdmin, $codigoProducto, $unidades);

    if ($anadido) {
        echo "TRUE";
    }else{
        echo "FALSE";
    }
}
?>