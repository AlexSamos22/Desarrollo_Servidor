<?php
require "funciones.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $usu = comprobar_usuario($_POST['correo'], $_POST['cont']);
  
    if($usu === false){
        $err = true;
    } else if($usu[2] == false){
        session_start();
        $_SESSION['usuario'] = $usu;
        unset($_SESSION['admin']); // Eliminar la sesión de admin si existe
        $_SESSION['carrito'] = [];
        header("Location: listaCategorias.php");
        return;
    } else {
        session_start();
        $_SESSION['admin'] = $usu;
        unset($_SESSION['usuario']); // Eliminar la sesión de usuario si existe
        header("Location: panelControl.php");
        return;
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
        <?php if(isset($_GET["redirigido"])){
            echo "<p>Haga login para continuar</p>";
        }?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <label for="correo">Correo</label>
            <input id="correo" name="correo" type="text">
            <label for="cont">Contraseña</label>
            <input id="cont" name="cont" type="password">
            <br>
            <input type="submit" value="Iniciar sesión">
            <br>
        </form>
        <?php 
        if (isset($err) and $err == true) {
            echo "No existe la cuenta, pruebe a <a href='registro.php'>registrarse</a>";
        }
        ?>
    </body>
</html>
