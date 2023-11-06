<?php
/*
Escribe un fichero que reciba  el código de un usuario y muestre por  pantalla todos sus datos.
*/
$cc = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'root' ;
$clave = "";

try {
    $db = new PDO($cc, $usuario, $clave);
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['cod'])) {
            $codigo = $_POST['cod'];
            $consulta = "SELECT codigo, nombre, clave, rol FROM usuarios";
            $usuarios = $db->query($consulta);
            
            foreach ($usuarios as $filas) {
                if ($codigo == $filas['codigo']){
                    echo "Nombre del usuario: ". $filas['nombre']. "<br>";
                    echo "Clave del usuario: ". $filas['clave']. "<br>";
                    echo "Rol del usuario: ". $filas['rol'];
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
        <label for="cod">Introduce el codigo del usuario</label>
        <input id="cod" name="cod" type="text">
        <input type="submit">
        </form>
        
    </body>
</html>

