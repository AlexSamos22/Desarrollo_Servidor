<?php
$fich = fopen("ficheroPrueba.txt", "r");
if ($fich === FALSE) {
    echo "No se encuentra ficheroPrueba.txt<br>";
}else{
    echo "ficheroPrueba.txt se abrio con exito<br>";
}

$fich = fopen("ficheronoexiste.txt", "r");
if ($fich === FALSE) {
    echo "No se encuentra ficheronoexiste.txt<br>";
}else{
    echo "ficheronoexiste.txt se abrio con exito<br>";
}


?>