<?php
$contenido = file_get_contents("ficheroPrueba.txt");

echo "Contenido del fichero: $contenido<br>";

$res = file_put_contents("ficheroSalida.txt", "Fichero creado con exito");
if ($res) {
    echo "Fichero creado";
}else{
    echo "Error al crear el fichero";
}
?>