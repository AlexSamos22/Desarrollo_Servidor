<?php
require 'bd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {     
	$correo = $_POST['usuario'];
    $clave = $_POST['clave'];
	$usu = comprobar_usuario($correo, $clave);
	if($usu===false){
		echo "FALSE";
	}else if($usu[2] == 2){
        session_start();
        $_SESSION['usuario'] = $usu;
        unset($_SESSION['admin']); // Eliminar la sesión de admin si existe
        $_SESSION['carrito'] = [];
        echo "true";
        return;
    } else {
        session_start();
        $_SESSION['admin'] = $usu;
        unset($_SESSION['usuario']); // Eliminar la sesión de usuario si existe
        echo "true";
        return;
    }
}else{
    echo "FALSE";
}
