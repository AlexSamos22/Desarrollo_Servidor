<?php
	/*comprueba que el usuario haya abierto sesión o redirige*/

	require_once 'bd.php';
	/*comprueba que el usuario haya abierto sesión o devuelve*/
	require 'sesiones_json.php';
	if(!comprobar_sesion()) return;	
	$resul = insertar_pedido($_SESSION['carrito'], $_SESSION['usuario']['codRes']);
	if($resul === FALSE){
		echo json_encode(array());			
	}else{						
		$productos = cargar_productos(array_keys($_SESSION['carrito']));
		// hay que añadir las unidades
		$productos = iterator_to_array($productos);
		foreach($productos as &$producto){
			$cod = $producto['CodProd'];
			$producto['unidades'] = $_SESSION['carrito'][$cod];	
		}
	
		echo json_encode($productos, true);
		//vaciar carrito	
		$_SESSION['carrito'] = [];
	}		
	