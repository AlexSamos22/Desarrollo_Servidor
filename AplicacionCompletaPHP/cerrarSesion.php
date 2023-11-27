<?php
include 'funciones.php';	

comprobar_sesion();


if (isset($_SESSION['usuario'])) {
    $_SESSION = array();
	session_destroy();	// eliminar la sesion
	setcookie(session_name(), 123, time() - 1000); // eliminar la cookie
	echo "Sesion cerrada";
    header("Location:login.php");
}else{
    $_SESSION = array();
	session_destroy();	// eliminar la sesion
	setcookie(session_name(), 123, time() - 1000); // eliminar la cookie
	echo "Sesion cerrada";
    header("Location:login.php");
}
?>

