<?php
    function comprobar_usuario($nombre, $clave){
        if ($nombre == "usuario" and $clave == "1234") {
            $usu['nombre'] = $nombre;
            $usu['cod'] = $clave;
            return $usu;
        }else if ($nombre == "admin" and $clave == "123456") {
            $usu['nombre'] = $nombre;
            $usu['cod'] = $clave;
            return $usu;
        }else{
            return FALSE;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $usu = comprobar_usuario($_POST['usuario'], $_POST['clave']);
        if ($usu == FALSE) {
            $err = true;
        }else{
            session_start();
            $_SESSION['usuario'] = $_POST['usuario'];
            header("Location: pagina_Inicial.php");
        }
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
        <?php
            if (isset($err) and $err == true) {
                echo "<p> revise usuario y contraseña</p>";
            }

            if (isset($_GET['redirigido'])) {
                echo "<p>Inicie sesion para continuar</p>";
            }
        ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input id="usuario" name="usuario" type="text">
            <input id="clave" name="clave" type="password">
            <input type="submit">
        </form>
    </body>
</html>