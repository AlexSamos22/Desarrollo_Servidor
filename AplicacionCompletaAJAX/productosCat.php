<?php
require "bd.php";
if (!comprobar_sesion()) {
    return;
}

$categoria = cargar_categoria($_GET['categoria']);

$productos = productos_categoria($_GET['categoria']);

$json = json_encode(iterator_to_array($productos, true));

echo $json;
?>