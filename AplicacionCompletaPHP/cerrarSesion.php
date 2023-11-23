<?php
include 'funciones.php';	

comprobar_sesion();


if (isset($_SESSION['usuario'])) {
    $_SESSION = array();
	session_destroy();	// eliminar la sesion
	setcookie(session_name(), 123, time() - 1000); // eliminar la cookie
    header("Location:login.php");
}else{
    $_SESSION = array();
	session_destroy();	// eliminar la sesion
	setcookie(session_name(), 123, time() - 1000); // eliminar la cookie
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Sesión cerrada</title>
	</head>
	<body>
		<p>La sesión se cerró correctamente, hasta la próxima</p>
		<a href = "login.php">Ir a la página de login</a>
	</body>
</html>
