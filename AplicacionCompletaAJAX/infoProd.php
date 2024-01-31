<?php
require "bd.php";

if (!comprobar_sesion()) {
    return;
}

$productos = cargar_info_productos();
$json = json_encode(iterator_to_array($productos, true));
echo $json;
?>