<?php
if (!isset($_COOKIE['visitas'])) {
    echo "Bienvenido por primera vez";
    setcookie("visitas", '1', time()+120);
}else{
    $visitas = $_COOKIE['visitas'];
    $visitas++;
    setcookie("visitas", $visitas, time()+120);
    echo "Bienvenido por $visitas vez";

}
?>