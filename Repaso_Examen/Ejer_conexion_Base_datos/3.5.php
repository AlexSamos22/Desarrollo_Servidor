<?php
/*
Modifica  el  formulario  de  login para que compruebe  usuario  y
contraseña usando la tabla usuarios de la base de datos empresa.
*/
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cc = "mysql:dbname=empresa;host=127.0.0.1";
    $user = "root";
    $clave= "";
    $nombre = $_POST['user'];
    $cont = $_POST['cont'];
    try {
        $db = new PDO($cc, $user, $clave);
        $consulta = "SELECT nombre, clave FROM usuarios WHERE nombre='$nombre' and clave = '$cont'";
        $result = $db->query($consulta);
        if ($result->rowCount() == 1) {
            echo "usuario y contraseña correctos";
        }else{
            echo "usuario o contrasela incorrectos";
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
                
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"
                method="post">
                <label for="user">Introduce el nombre del usuario</label>
                <input id="user" name="user" type="text">
                <br>
                <label for="cont">Introduce la contraseña del usuario</label>
                <input id="cont" name="cont" type="text">
                <br>
                <input type="submit">
                </form>
                
            </body>
        </html>



