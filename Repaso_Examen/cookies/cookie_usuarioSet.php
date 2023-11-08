<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $user = $_POST['username'];
    setcookie("name", $name, time() + 120);
    setcookie("username", $user, time() + 120);
    header("Location: cookie_usuario.php");
}
?>