<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['timeCookie'])) {
        $duracionCookie = intval($_POST['timeCookie']); // Convert to an integer
        setcookie("tiempo", $duracionCookie, time() + $duracionCookie);
        echo "La cookie ha sido creada.";
    }

    if (isset($_POST['eliminarCookie'])) {
        setcookie("tiempo", "", time() - 3600); // Eliminar la cookie
        echo "La cookie ha sido eliminada.";
    }

    // Comprueba si se ha enviado un formulario para comprobar la cookie
    if (isset($_POST['comprobarCookie'])) {
        if (isset($_COOKIE['tiempo'])) {
            $tiempoRestante = $_COOKIE['tiempo'] - time() ;
            if ($tiempoRestante > 0) {
                echo "Tiempo restante de la cookie: $tiempoRestante segundos";
            } else {
                echo "La cookie ha expirado.";
            }
        } else {
            echo "La cookie no existe o ha expirado.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Resto de tu código HTML -->
    </head>
    <body>
        <h2>Creación, eliminación y comprobación de cookies</h2>
        <p>Elija una opción</p>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <label for="timeCookie">Crear una Cookie con una duración limitada (10 y 60) segundos</label>
            <input name="timeCookie" id="timeCookie" type="number">
            <br>
            <input type="submit" value="Crear Cookie">
        </form>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <input type="submit" name="eliminarCookie" value="Eliminar Cookie">
        </form>

        <!-- Agregar un tercer formulario para comprobar la cookie -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <input type="submit" name="comprobarCookie" value="Comprobar Cookie">
        </form>
    </body>
</html>
