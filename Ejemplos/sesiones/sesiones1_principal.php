<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: sesiones1_login.php?redirigido=true");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pagina principal</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        
        <?php
            echo "Bienvenido ". $_SESSION['usuario'];
        ?>
        <br><a href="sesiones1_logout.php">Salir</a>

        <script src="" async defer></script>
    </body>
</html>