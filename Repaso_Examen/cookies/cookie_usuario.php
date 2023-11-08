<?php
if (isset($_COOKIE['name']) and isset($_COOKIE['username'])) {
    echo "Hola de nuevo: ". $_COOKIE['name']. "<br>";
    echo "Su nombre de usuario es: ". $_COOKIE['username'];
}else{
    echo "Bienvenido por primera vez!!!!";
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
        <form action="cookie_usuarioSet.php" method="post">
            <input name="name" type="text">
            <input name="username" type="text">
            <input type="submit">
        </form>
    </body>
</html>