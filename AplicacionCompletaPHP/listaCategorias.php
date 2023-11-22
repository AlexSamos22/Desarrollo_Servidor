<?php
include "funciones.php";

comprobar_sesion();

include "cabecera.php";

$cat = cargar_categorias();

foreach ($cat as $row) {
    $url = "productosCat.php?categoria=". $row['id_cat'];
    echo "<ul>";
    echo "<li><a href='$url'>".$row['nombre']."</a></li>";
    echo "</ul>";
}


?>