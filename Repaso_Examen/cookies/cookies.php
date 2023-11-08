<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['valor'])) {
    $color = $_POST['valor'];
    setcookie('color', $color, time() + 120);
    header("Location: cookies_color.php");
}
/*
if (!isset($_COOKIE['visitas'])) {
    setcookie("visitas", '1', time()+3600*24);
    echo "Bienvenido por primera vez a la web";
}else{
    $visitas = (int) $_COOKIE['visitas'];
    $visitas++;
    setcookie("visitas", $visitas , time() + 3600 * 24);
    echo "Bienvenido por $visitas vez";
}
*/
?>
