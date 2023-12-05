<?php
include "funciones.php";

comprobar_sesion();

include "cabecera.php";

$cat = cargar_categorias();
echo "<h2>Categorías de la tienda</h2><br>";
echo "<div style='display: flex; flex-wrap: wrap;'>"; // Contenedor flex para los botones
foreach ($cat as $row) {
    $url = "productosCategoriasAñadirStock.php?categoria=" . $row['id_cat'];
    echo "<button style='margin: 5px;'><a href='$url'>" . $row['nombre'] . "</a></button>";
}
echo "</div>";


?>