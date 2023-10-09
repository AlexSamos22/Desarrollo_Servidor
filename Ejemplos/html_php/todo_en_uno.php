<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if ($_POST['usuario'] == "usuario" and $_POST['clave'] == "12345") {
            header("Location:/Ejemplos/html_php/bienvenida.html");
        }else{
            $err = true;
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
            if (isset($err)) {
                echo "<p> Revise usuario y contraseña </p>";
            }
        ?>

        <form method="POST"
            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <label for="usuario">Usuario</label>
        <input value="<?php if(isset($usuario))echo $usuario;?>"
        id="usuario" name="usuario" type="text">
        <label for="clave">Clave</label>
        <input id="clave" name="clave" type="password">
        <input type="submit">
        </form>
        
        <script src="" async defer></script>
    </body>
</html>