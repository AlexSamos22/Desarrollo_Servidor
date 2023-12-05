<?php 
	include 'funciones.php';

	comprobar_sesion();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Productos de la categoría</title>		
	</head>
	<body>
		<?php 
		require 'cabecera.php';
		$categoria = cargar_categoria($_GET['categoria']);
		$id_categoria=$_GET['categoria'];
		$productos = productos_categoria($_GET['categoria']);		
		if($categoria=== FALSE or $productos === FALSE){
			echo "<p class='error'>Error al conectar con la base datos</p>";
			exit;
		}
		echo "<h1>" . $categoria['nombre'] . "</h1>";
		echo "<table style='border-collapse: collapse; width: 100%; text-align: center;'>";
		echo "<tr><th style='border: 1px solid black; padding: 8px;'>Nombre</th><th style='border: 1px solid black; padding: 8px;'>Unidades</th><th style='border: 1px solid black; padding: 8px;'>Precio</th><th style='border: 1px solid black; padding: 8px;'>Comprar</th></tr>";
		foreach ($productos as $producto) {
			$cod = $producto['ID_Producto'];
			$nom = $producto['Nombre'];
			$stock = $producto['Stock'];
			$precio = $producto['Precio'];

			echo "<tr>";
			echo "<td style='border: 1px solid black; padding: 5px;'>$nom</td>";
			echo "<td style='border: 1px solid black; padding: 8px;'>$stock</td>";
			echo "<td style='border: 1px solid black; padding: 8px;'>$precio</td>";
			echo "<td style='border: 1px solid black; padding: 8px;'>
			<form action='añadirAlCarrito.php' method='POST'>
				<input name='categoria' type='hidden' value='$id_categoria'>
				<input name='unidades' type='number' min='1' value='1' max='$stock' style='width: 50px;'>
				<input type='submit' value='Comprar' style='padding: 5px; margin-left: 5px;'>
				<input name='cod' type='hidden' value='$cod'>
			</form>
			</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<a href='carrito.php' style='display: block; margin-top: 10px; text-decoration: none; padding: 8px; background-color: #f44336; color: white; width: fit-content;'>Ir al carrito</a>";
	
		?>				
	</body>
</html>