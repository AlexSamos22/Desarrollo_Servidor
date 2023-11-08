<?php
if (isset($_POST['idioma'])) {
    $idioma = $_POST['idioma'];

    setcookie("idioma", $idioma, time() + 120);
    header("Location: php2.php");
}
?>
