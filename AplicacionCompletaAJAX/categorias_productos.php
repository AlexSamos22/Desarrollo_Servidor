<?php
require "bd.php";
if (!comprobar_sesion()) {
    return;
}

$numero_cats = cargar_categorias_productos();
$json = json_encode(iterator_to_array($numero_cats, true));
echo $json;
?>