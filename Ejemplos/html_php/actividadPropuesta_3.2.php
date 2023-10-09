<?php

    
    if (!isset($_COOKIE['visitas'])) {
        setcookie('visitas', '1', time() + 3600 * 24);
        echo "Bienvenido por primera vez";
    }else{
        $visitas = (int) $_COOKIE['visitas'];
        $visitas ++;
        setcookie('visitas', $visitas, time() + 3600 * 24);
        echo "Bienvenido por $visitas vez";
    }
    echo '<br><a href="eliminarCookie.php">Eliminar Cookie</a>';
?>
?>