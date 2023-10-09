<?php
    if (isset($_POST['idioma'])) {
        $idioma = $_POST['idioma'];
        setcookie('idioma', $idioma, time() + 3600 * 24);
        header("Location: actividadPropuesta_3.3.php");
        exit;
    }
?>