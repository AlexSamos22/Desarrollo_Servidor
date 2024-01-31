<?php
require "bd.php";

if (!comprobar_sesion()) {
    return;
}

$cats = cargar_nombres_cat();
$json = json_encode(iterator_to_array($cats, true));
echo $json;
?>