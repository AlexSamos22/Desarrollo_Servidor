<?php
include "funciones.php";

comprobar_sesion();

include "cabecera.php";

echo "<ul>";
echo "<li><a href='listaCategoriasAñadirStock.php'>Añadir Stock</a></li>";
echo "<li><a href='modUsuarios.php'>Modificar Usuarios</a></li>";
echo "<li><a href='añadirProductos.php'>Añadir Productos</a></li>";
echo "<li><a href='eliminarProducto.php'>Eliminar Productos</a></li>";
echo "</ul>";

?>