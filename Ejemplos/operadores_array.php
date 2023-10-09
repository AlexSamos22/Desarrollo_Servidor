<?php
$arr1 = array(1 => "3000", 2 => "4000");
$arr2 = array(1 => 3000, 2 => 4000);
$arr3 = array(2 => "4000", 1 => "3000");

if ($arr1 == $arr2) {
    echo "arr1 y arr2 son iguales <br>";
}else{
    echo "arr1 y arr2 no son iguales <br>";
}

if ($arr1 == $arr3) {
    echo "arr1 y arr3 son iguales<br>";
}else {
    echo "arr1 y arr3 no son iguales<br>";
}

if ($arr1 === $arr2) {
    echo "arr1 y arr2 son identicos <br>";
}else {
    echo "arr1 y arr2 no son identicos <br>";
}

if ($arr1 === $arr2) {
    echo "arr1 y arr3 son identicos <br>";
}else {
    echo "arr1 y arr3 no son identicos";
}


?>