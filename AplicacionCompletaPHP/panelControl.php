<?php
include "funciones.php";

comprobar_sesion();

include "cabecera.php";

echo "<div style='display: flex;'>"; // Contenedor flex para los botones en una fila
echo "<style>button { margin-right: 5px; }</style>"; // Estilo para el espacio entre botones

// Estilo para los botones (tamaño, margen, etc.)
$estilo = "padding: 5px 10px; font-size: 14px; margin-right: 5px;";
echo "<button style='$estilo'><a href='listaCategoriasAñadirStock.php' style='text-decoration: none; color: inherit;'>Añadir Stock</a></button>";
echo "<button style='$estilo'><a href='modUsuarios.php' style='text-decoration: none; color: inherit;'>Modificar Usuarios</a></button>";
echo "<button style='$estilo'><a href='añadirProductos.php' style='text-decoration: none; color: inherit;'>Añadir Productos</a></button>";
echo "<button style='$estilo'><a href='eliminarProducto.php' style='text-decoration: none; color: inherit;'>Eliminar Productos</a></button>";
echo "<button style='$estilo'><a href='addCategoria.php' style='text-decoration: none; color: inherit;'>Añadir Categoria</a></button>";
echo "</div>";

?>