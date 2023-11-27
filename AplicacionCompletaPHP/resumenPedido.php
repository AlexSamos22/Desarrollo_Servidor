<?php
	/*comprueba que el usuario haya abierto sesión o redirige*/
//	require 'correo.php';
	require 'sesiones.php';
	require_once 'bd.php';
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
		
		echo "Pedido realizado con exito. Resumen del pedido: </BR>";
		echo "<h1>Pedido nº $resul</h1>";
		$productos = cargar_productos(array_keys($_SESSION['carrito']));
		echo "<table>"; //abrir la tabla
		echo "<tr><th>Nombre</th><th>Descripción</th><th>Peso</th><th>Unidades</th></tr>";
		foreach ($productos as $producto) {
			$cod=$producto['ID_Producto'];
			$nom=$producto['Nombre'];	
			$unidades=$_SESSION['carrito'][$cod];
			$pesoTotal = $peso * $unidades;
			echo "<tr><td>$nom</td><td>$des</td><td>$pesoTotal</td><td>$unidades</td>";
		}
		echo "</table>";

		$_SESSION['carrito'] = [];

		}		
	?>		
	</body>
</html>
	