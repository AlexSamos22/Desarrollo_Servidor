<?php
    include "bd.php";
    if (!comprobar_sesion()) {
        return;
    }

    $clientes = cargar_clientes();
    $json = json_encode(iterator_to_array($clientes, true));
    echo $json;
?>