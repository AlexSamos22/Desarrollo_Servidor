<?php 
require 'bd.php';
if(!comprobar_sesion()) return;	

$cod = $_POST['cod'];
$unidades = (int)$_POST['unidades'];

if(isset($_SESSION['carrito'][$cod])){
	$_SESSION['carrito'][$cod] += $unidades;
}else{
	$_SESSION['carrito'][$cod] = $unidades;		
}