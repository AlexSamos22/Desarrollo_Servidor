<?php
    include "bd.php";
    if (!comprobar_sesion()) {
        return;
    }

    $admins = cargar_administradores();
    $json = json_encode(iterator_to_array($admins, true));
    echo $json;
?>