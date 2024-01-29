<?php
$cc = "mysql:dbname=pedidos;host=127.0.0.1";
$user = "root";
$clave = "";
$bd = new PDO($cc, $user, $clave);

$cat = "SELECT CodCat, nombre FROM categorias";

$resul = $bd->query($cat);
$array = [];

foreach ($resul as $value) {
    array_push($array, array("cod" => $value["CodCat"], "nombre" => $value["nombre"]));
}

$json = json_encode($array);

echo $json;

/*
$catl = array("cod" => 1, "nombre" => "Comida");
$cat2 = array("cod" => 2, "nombre" => "Bebida");
$array = array($catl, $cat2);
$json = json_encode($array); 
echo $json;
*/
?>