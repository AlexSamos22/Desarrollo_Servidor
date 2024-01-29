<?php
$arr1 = ["cod" => "1", "nombre" => "patatas"];
$arr2 = ["cod" => "2", "nombre" => "cebollas"];
$arr3 = array($arr1, $arr2);
$json = json_encode($arr3);
echo $json;
?>