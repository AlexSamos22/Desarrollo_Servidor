<?php
require "bd.php";

if(!comprobar_sesion()){
    return;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $cont = $_POST['cont'];

    $mod = add_admin($nombre, $apellidos, $correo, $cont);

    if ($mod) {
        echo "TRUE";
    }else{
        echo "FALSE";
    }
}
?>