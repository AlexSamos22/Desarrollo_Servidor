<?php

/*
sort()Orden ascendente
rsort()Orden descendente
asort()Ordena por valor as
arsort()ordena por valor des
ksort()
krsort()
*/
$arr1 = [6,3,2,0,1,10,11,8,5,7,9];
$arr2 = ["a","A","b","c","D","E","F","B","c","d"];

krsort($arr1);
sort($arr2);

print_r($arr1);

?>