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
		echo "<table style='border-collapse: collapse; width: 100%; text-align: center;'>";
		echo "<tr><th style='border: 1px solid black; padding: 8px;'>Código</th><th style='border: 1px solid black; padding: 8px;'>Nombre</th><th style='border: 1px solid black; padding: 8px;'>Unidades</th><th style='border: 1px solid black; padding: 8px;'>Eliminar</th></tr>";
		foreach ($productos as $producto) {
			$cod = $producto['ID_Producto'];
			$nom = $producto['nombre'];
			$unidades = $_SESSION['carrito'][$cod];

			echo "<tr>";
			echo "<td style='border: 1px solid black; padding: 8px;'>$cod</td>";
			echo "<td style='border: 1px solid black; padding: 8px;'>$nom</td>";
			echo "<td style='border: 1px solid black; padding: 8px;'>$unidades</td>";
			echo "<td style='border: 1px solid black; padding: 8px;'>
			<form action='eliminar.php' method='POST'>
				<input name='unidades' type='number' min='1' value='1' style='width: 50px;'>
				<input type='submit' value='Eliminar' style='padding: 5px; margin-left: 5px;'>
				<input name='cod' type='hidden' value='$cod'>
			</form>
			</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<hr>";
		echo "<a href='resumenPedido.php' style='display: block; margin-top: 10px; text-decoration: none; padding: 8px; background-color: #f44336; color: white; width: fit-content; margin: 0 auto; text-align: center;'>Realizar pedido</a>";
	?>
	</body>
</html>
