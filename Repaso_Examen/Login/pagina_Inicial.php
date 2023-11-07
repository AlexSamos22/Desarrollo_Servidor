<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php?redirigido=true");
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
    <h1>BIENVENIDO A LA PAGINA WEB</h1>
    <br>
    <a href="log_out.php">Log out</a>
    </body>
</html>