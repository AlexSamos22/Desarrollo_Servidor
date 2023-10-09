<?php
    if ($_POST['usuario'] == "usuario" and $_POST['clave'] == "1234") {
        header("Location:/Ejemplos/html_php/bienvenida.html");
    }else{
        header("Location:/Ejemplos/html_php/Error.html");
    }
?>