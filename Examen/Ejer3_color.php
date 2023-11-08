<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $color = $_POST['color'];
        setcookie('color', $color, time()+120);
        header("Location: Ejer3_inicio.php");
    }
?>