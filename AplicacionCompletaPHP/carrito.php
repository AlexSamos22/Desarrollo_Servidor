<?php 
	/*comprueba que el usuario haya abierto sesión o redirige*/
	require_once 'funciones.php';
	comprobar_sesion();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Carrito de la compra</title>		
	</head>
	<body>
		
		<?php 
		require 'cabecera.php';			
		$productos = cargar_productos(array_keys($_SESSION['carrito']));
		if($productos === FALSE){
			echo "<p>No hay productos en el pedido</p>";
			exit;
		}
		echo "<h2>Carrito de la compra</h2>";
		echo "<table>"; //abrir la tabla
		echo "<tr><th>Codigo</th><th>Nombre</th><th>Unidades</th><th>Eliminar</th></tr>";
		foreach($productos as $producto){
			$cod = $producto['ID_Producto'];
			$nom = $producto['nombre'];
			$unidades = $_SESSION['carrito'][$cod];								
			
			//print_r($producto);				
			echo "<tr><td>$cod</td><td>$nom</td><td>$unidades</td>
			<td><form action = 'eliminar.php' method = 'POST'>
			<input name = 'unidades' type='number' min = '1' value = '1'>
			<input type = 'submit' value='Eliminar'>
			<input name = 'cod' type='hidden' value = '$cod'>  </form></td></tr>";	
		}
		echo "</table>";						
		?>
		<hr>
		<a href = "resumenPedido.php">Realizar pedido</a>		
	</body>
</html>
