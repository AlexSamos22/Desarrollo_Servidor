<?php
/*
Modifica  el  formulario  de  login para que compruebe  usuario  y
contraseña usando la tabla usuarios de la base de datos empresa.
*/
$cc = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'root' ;
$clave = "";

try {
    $db = new PDO($cc, $usuario, $clave);
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['user']) and isset($_POST['cont'])) {
            $nombre = $_POST['user'];
            $cont = $_POST['cont'];
            $consulta = "SELECT nombre, clave FROM usuarios";
            $usuarios = $db->query($consulta);
            
            foreach ($usuarios as $filas) {
                if ($nombre == $filas['nombre'] and $cont == $filas['clave']){
                    echo "Usuario y contraseña correctos";
                }
            }
        }
    }
} catch (PDOException $e) {
    echo $e->getMessage();
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

