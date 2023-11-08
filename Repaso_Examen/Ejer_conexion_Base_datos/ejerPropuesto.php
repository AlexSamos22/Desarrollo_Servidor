<?php
/*
Realizar una aplicación Web que nos pida datos de un usuario para la bbdd de usuarios, 
si no existe, debería darlo de alta y si existiese debería modificar la bbdd.

Select: SELECT nombre, clave, rol FROM usuarios'
Delete: delete from usuarios where nombre = 'Luisa'
Update: update usuarios set rol = 0, clave = 1 where rol = 1 
Insert: insert into usuarios(nombre, clave, rol)
        values('Alberto', '3333', '1')"
*/
if (isset($_POST['user']) and isset($_POST['cont']) and isset($_POST['rol'])) {
    $cc = 'mysql:dbname=empresa;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';
    try {
            $db = new PDO($cc,$usuario,$clave);
            echo "Conexion establecida <br>";
            $user = $_POST['user'];
            $cont = $_POST['cont'];
            $rol = $_POST['rol'];
    
            $comprobarExistencia = "SELECT nombre, clave, rol FROM usuarios WHERE nombre = '$user'";
            $existe = $db->query($comprobarExistencia);

            if ($existe->rowCount() == 1) {
                echo "El usuario existe <br>";
                echo "Comprobando si hay que actualizar algun campo<br>";
                $comprobarAct = "SELECT nombre, clave, rol FROM usuarios WHERE nombre = '$user' and clave = '$cont' and rol = '$rol'";
                $act = $db->query($comprobarAct);
                if ($act->rowCount() == 1) {
                    echo "Todos los campos son iguales no se actualizara nada";
                }else{
                    echo "Hay campos distintos se actualizaran<br>";
                    $upd = "UPDATE usuarios set clave = '$cont', rol = '$rol' WHERE nombre = '$user'";
                    $result = $db->query($upd);
                    echo "Se han actualizado ". $result->rowCount(). " filas";
                }
            }else{
                echo "El usuario no existe se creara<br>";
                $ins = "insert into usuarios(nombre, clave, rol) values('$user', '$cont', '$rol')";
                $result = $db->query($ins);
                echo "Se han insertado ". $result->rowCount(). " filas";
            } 
    } catch (\Throwable $th) {}
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
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <label for="user">Inserte nombre del usuario</label>
            <input id="user" name="user" type="text">
            <br>
            <label for="cont">Inserte la clave del usuario</label>
            <input id="cont" name="cont" type="text">
            <br>
            <label for="rol">Inserte el rol del usuario</label>
            <input id="rol" name="rol" type="text">
            <br>
            <input type="submit">
        </form>
    </body>
</html>