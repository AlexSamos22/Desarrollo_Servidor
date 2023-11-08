<?php
/*
Escribe un fichero que reciba  el código de un usuario y muestre por  pantalla todos sus datos.
*/
if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['cod'])) {
    $codUsuario = $_POST['cod'];
    $cc = "mysql:dbname=empresa;host=127.0.0.1";
    $user = "root";
    $clave= "";
    try {
        $db = new PDO($cc, $user, $clave);
        $consulta = "SELECT codigo, nombre, clave, rol FROM usuarios WHERE codigo = '$codUsuario'";
        $usuarios = $db->query($consulta);

        foreach ($usuarios as $filas) {
            if ($codUsuario == $filas['codigo']) {
                echo "Usuario encontrado, sus datos son: <br>";
                echo "Codigo ". $filas['codigo']. "<br>";
                echo "Nombre ". $filas['nombre']. "<br>";
                echo "Clave ". $filas['clave']. "<br>";
                echo "rol". $filas['rol']. "<br>";
            }
        }

        if ($usuarios->rowCount() == 0) {
            $err = true;
        }
    } catch (PDOException $th) {
        echo $th->getMessage();
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
            echo "<p>Revise el codigo del usuario</p>";
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"
        method="post">
        <label for="cod">Introduce el codigo del usuario</label>
        <input id="cod" name="cod" type="text">
        <input type="submit">
        </form>
    </body>
</html>

