<?php
$cc = "mysql:dbname=pedidos;host=127.0.0.1";
$user = "root";
$clave = "";

$bd = new PDO($cc, $user, $clave);
$consulta = "SELECT CodProd, nombre, descripcion, peso, stock, categoria  FROM productos";
$result = $bd->query($consulta);
$json = json_encode(iterator_to_array($result, true));
echo $json;
?>