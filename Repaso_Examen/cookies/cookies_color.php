<?php
if (isset($_COOKIE['color'])) {
    echo "El color elegido es: ". $_COOKIE['color'];
}else{
    echo "Color por defecto: rojo";
}

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
        <form action="cookies.php" method="post">
            <input name="valor" type="text">
            <input type="submit">
        </form>
        <form action="borrar_cookie.php" method="post">
            <input type="submit" value="Borrar cookie">
            <input type="hidden" value="borrar" name="eliminar">
        </form>
    </body>
</html>