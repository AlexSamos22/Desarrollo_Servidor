<?php
if (isset($_COOKIE['color'])) {
    $color = $_COOKIE['color'];
    echo "<font color='$color'>";
    echo "<p>Bienvenido a esta pagina!!!<br>";
    echo "<font>";
    echo "<a href='Ejer3.php'>Volver</a>";
}else{
    echo "<font color='black'>";
    echo "<p>Bienvenido a esta pagina!!!<br>";
    echo "<font>";
    echo "<a href='Ejer3.php'>Volver</a>";
}
?>