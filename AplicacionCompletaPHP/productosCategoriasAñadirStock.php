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
		echo "<h1>". $categoria['nombre']. "</h1>";
		echo "<table>";
		echo "<tr><th>Nombre</th><th>Unidades</th><th>Unidades Añadidas</th></tr>";
		foreach($productos as $producto){
			$cod = $producto['ID_Producto'];
			$nom = $producto['Nombre'];
			$stock = $producto['Stock'];						
			echo "<tr><td>$nom</td><td>$stock</td>

			<td><form action = 'añadirStock.php' method = 'POST'>

			<input name = 'categoria' type='hidden' value = '$id_categoria'>

			<input name = 'unidades' type='number' min = '1' value = '1'>
			<input type = 'submit' value='Añadir'>
            <input name = 'cod' type='hidden' value = '$cod'>
			</form></td></tr>";
		}
		echo "</table>";
		?>				
	</body>
</html>