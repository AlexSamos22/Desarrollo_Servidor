<?php
	/*comprueba que el usuario haya abierto sesión o redirige*/
//	require 'correo.php';
	require 'funciones.php';
	comprobar_sesion();
?>	
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Pedidos</title>		
	</head>
	<body>
	<?php 
	require 'cabecera.php';			
	$resul = insertar_pedido($_SESSION['carrito'], $_SESSION['usuario'][3]);
	if($resul === FALSE){
		echo "No se ha podido realizar el pedido<br>";			
	}else{
		$compra=$_SESSION['carrito'];
		
		echo "Pedido realizado con éxito. Resumen del pedido:</br>";
		echo "<h1>Pedido nº $resul</h1>";
		$productos = cargar_productos(array_keys($_SESSION['carrito']));
		echo "<table style='border-collapse: collapse; width: 100%; text-align: center;'>";
		echo "<tr><th style='border: 1px solid black; padding: 8px;'>Nombre</th><th style='border: 1px solid black; padding: 8px;'>Unidades</th><th style='border: 1px solid black; padding: 8px;'>Precio Total</th></tr>";
		foreach ($productos as $producto) {
			$cod = $producto['ID_Producto'];
			$nom = $producto['nombre'];
			$unidades = $_SESSION['carrito'][$cod];
			$precioTotal = $producto['precio'] * $unidades;
			echo "<tr>";
			echo "<td style='border: 1px solid black; padding: 8px;'>$nom</td>";
			echo "<td style='border: 1px solid black; padding: 8px;'>$unidades</td>";
			echo "<td style='border: 1px solid black; padding: 8px;'>$precioTotal</td>";
			echo "</tr>";
		}
		echo "</table>";

		$_SESSION['carrito'] = [];

		}		
	?>		
	</body>
</html>
	