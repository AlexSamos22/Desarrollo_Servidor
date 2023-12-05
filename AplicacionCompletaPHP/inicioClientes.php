<?php
include "funciones.php";

comprobar_sesion();

include "cabecera.php";
echo "<h1>Bienvenido a nuestra tienda</h1><br>";
echo "<h2>Observe nuestra variedad de categorías de productos</h2><br>";
echo "<button style='padding: 5px 10px; font-size: 14px;'><a href='listaCategorias.php' style='text-decoration: none; color: inherit;'>Ver categorías de la tienda</a></button>";
echo "<br>";
echo "<h2>Historial de pedidos</h2><br>";
echo "<button style='padding: 5px 10px; font-size: 14px;'><a href='historialPedidos.php' style='text-decoration: none; color: inherit;'>Ver su historial de pedidos</a></button>";



?>