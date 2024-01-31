<?php
require "bd.php";

if(!comprobar_sesion()){
    return;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $correo = $_POST['correo'];
    $mod = del_admin($correo);

    if ($mod) {
        echo "TRUE";
    }else{
        echo "FALSE";
    }
}
?>