<?php
$cc = "mysql:dbname=empresa;host=127.0.0.1";
$user = "root";
$clave = "";

$bd = new PDO($cc, $user, $clave);
$consulta = "SELECT CodDept, nombre, jefe, presupuesto, ciudad FROM departamentos";
$resul = $bd->query($consulta);

$json = json_encode(iterator_to_array($resul, true));
echo $json;
?>