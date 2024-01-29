<?php

$cc = "mysql:dbname=pedidos;host=127.0.0.1";
$user = "root";
$clave = "";

$db = new PDO($cc, $user, $clave);
$consulta = "SELECT CodRes, ciudad, direccion FROM restaurantes";
$result = $db->query($consulta);
$json = json_encode(iterator_to_array($result, true));
echo $json;

?>