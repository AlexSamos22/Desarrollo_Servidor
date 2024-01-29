<?php
	require_once 'bd.php';
	if(!comprobar_sesion()) return;	

	$resul = insertar_pedido($_SESSION['carrito'], $_SESSION['usuario'][3]);
	if($resul === FALSE){
		echo json_encode(array());			
	}else{						
		$productos = cargar_productos(array_keys($_SESSION['carrito']));

		$productos = iterator_to_array($productos);
		foreach($productos as &$producto){
			$cod = $producto['ID_Producto'];
			$producto['unidades'] = $_SESSION['carrito'][$cod];	
		}
	
		echo json_encode($productos, true);
		//vaciar carrito	
		$_SESSION['carrito'] = [];
	}	