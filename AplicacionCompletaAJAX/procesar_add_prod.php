<?php
    include "bd.php";

    if (!comprobar_sesion()) {
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nombre = $_POST['nombre'];

        $add = add_Cat($nombre);

        if ($add) {
            echo "TRUE";
        }else{
            echo "FALSE";
        }
    }
?>