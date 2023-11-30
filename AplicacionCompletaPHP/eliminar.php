<?php 

include "funciones.php";
comprobar_sesion();
$cod = $_POST['cod'];
$unidades = $_POST['unidades'];

if(isset($_SESSION['carrito'][3])){		
	$_SESSION['carrito'][3] -= $unidades;
	if($_SESSION['carrito'][3] <= 0){
		unset($_SESSION['carrito'][3]);
	}
	
}
header("Location: carrito.php");
