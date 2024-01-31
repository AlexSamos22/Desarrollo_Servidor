<?php
include "bd.php";
if (!comprobar_sesion()) {
    return;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cod = $_POST['codigo'];
   
    $eliminacion = del_prod($cod);

    if ($eliminacion) {
        echo "TRUE";
    }else{
        echo "FALSE";
    }

}
?>