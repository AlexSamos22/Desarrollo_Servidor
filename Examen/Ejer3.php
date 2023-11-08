<?php
/*
EJERCICIO 3 (2,5 puntos): Escriba una página que cambie el color de la
letra según el color indicado por el usuario y que conste de dos páginas.
----En la primera página se elige el color y hay un enlace a la segunda
    página.
----En la segunda página se muestra el texto en el color elegido en la
    primera página, y hay un enlace a la primera página.
----El color indicado por el usuario se debe guardar en una cookie, no
    se deben utilizar controles ocultos.
*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="Ejer3_color.php" method="post">
            <label for="color"></label>
            <select name="color">
                <option value="red">Rojo</option>
                <option value="blue">Azul</option>
                <option value="yellow">Amarillo</option>
                <option value="green">Verde</option>
                <option value="purple">Morado</option>
            </select>
            <br>
            <input type="submit" value="Ver el color de letra">
        </form>
    </body>
</html>