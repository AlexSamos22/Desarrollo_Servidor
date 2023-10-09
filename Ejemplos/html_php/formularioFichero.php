<?php
 $tam = $_FILES["fichero"]["size"];
 if ($tam > 256 * 1024) {
    echo "Demasiado Grande <br>";
    return;
 }

 echo "<br>Nombre del fichero: " . $_FILES["fichero"]["name"];
 echo "<br>Nombre temporal del fichero en el servidor: ". $_FILES["fichero"]["tmp_name"];

 $res = move_uploaded_file($_FILES["fichero"]["tmp_name"], "subidos/". $_FILES["fichero"]["name"]);

 if ($res) {
    echo "<br>Fichero guardado";
 }else{
    echo "Error";
 }
?>