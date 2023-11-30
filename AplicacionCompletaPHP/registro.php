<?php
include "funciones.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $cont = $_POST['cont'];

    $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
    

    try {
        $db = new PDO($res[0], $res[1], $res[2]);
        $contrasenaCifrada = password_hash($cont, PASSWORD_DEFAULT);

        $ins = "INSERT INTO cliente(nombre, apellidos, correo, contraseña) values('$nombre', '$apellidos', '$correo', '$contrasenaCifrada')";

        $result = $db->query($ins);

        if ($result) {
            echo "Usuario añadido con exito";
            header("Location: login.php");
        }else{
            echo "Algo ha salido mal";
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
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
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <label for="correo">Correo</label>
            <input id="correo" name="correo" type="text">
            <label for="nombre">Usuario</label>
            <input id="nombre" name="nombre" type="text">
            <label for="apellidos">Apellidos</label>
            <input id="apellidos" name="apellidos" type="text">
            <label for="cont">Contraseña</label>
            <input id="cont" name="cont" type="password">
            <br>
            <input type="submit" value="Registrarse">
            <br>
        </form>
        <a href="login.php">Volver al Login</a>
    </body>
</html>