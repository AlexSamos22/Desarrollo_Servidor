<?php
include "funciones.php";

comprobar_sesion();

include "cabecera.php";

echo "<ul>";
echo "<li><a href='listaCategoriasAñadirStock.php'>Añadir Stock</a></li>";
echo "<li><a href='modUsuarios.php'>Modificar Usuarios</a></li>";
echo "</ul>";

?>