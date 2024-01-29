<?php
include 'bd.php';	

comprobar_sesion();


if (isset($_SESSION['usuario'])) {
    $_SESSION = array();
	session_destroy();	// eliminar la sesion
	setcookie(session_name(), 123, time() - 1000); // eliminar la cookie
}else{
    $_SESSION = array();
	session_destroy();	// eliminar la sesion
	setcookie(session_name(), 123, time() - 1000); // eliminar la cookie
}
?>