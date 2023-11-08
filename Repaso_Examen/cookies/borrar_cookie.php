<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eliminar'])) {
    setcookie("color", 123, time()- 3600 * 24);
    header("Location: cookies_color.php");
}
?>