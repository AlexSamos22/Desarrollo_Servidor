<?php
require "bd.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST["apellidos"];
    $cont = $_POST['cont'];

    $reg = registro($nombre, $apellidos, $correo, $cont);

    if ($reg == true) {
        echo "TRUE";
    }else{
        echo "FALSE";
    }
}
?>