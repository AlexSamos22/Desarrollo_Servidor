<?php
include "bd.php";
if (!comprobar_sesion()) {
    return;
}

$historial = cargar_historial_pedidos(3);

$json = json_encode(iterator_to_array($historial, true));

echo $json


?>