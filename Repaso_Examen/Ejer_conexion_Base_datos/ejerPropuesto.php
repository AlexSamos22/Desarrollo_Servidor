<?php
/*
Realizar una aplicación Web que nos pida datos de un usuario para la bbdd de usuarios, 
si no existe, debería darlo de alta y si existiese debería modificar la bbdd.

Select: SELECT nombre, clave, rol FROM usuarios'
Delete: delete from usuarios where nombre = 'Luisa'
Update: update usuarios set rol = 0 where rol = 1 
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
    
            $usuarios = 'SELECT nombre, clave, rol FROM usuarios';
            $resul = $db->query($usuarios);
    
            $accion = false;
            $crear = false;
    
            foreach ($resul as $row) {
                if ($user == $row['nombre']) {
                    if ($cont == $row['clave'] and $rol == $row['rol']) {
                        $accion = true;
                    }else{
                        $crear = true;
                    }
                }
            }
    
            if (!$accion) {
                if ($crear) {
                    echo "El usuario existe, pero hay campos distintos y se actualizaran <br>";
                    $upd = "update usuarios set rol='$rol', clave = '$cont' where nombre='$user'";
                    $resul = $db->query($upd);
                    if (!$resul) {
                        echo "Error: ". print_r($bd->errorInfo());
                    }else{
                    echo "Actualizacion realizada con exito, filas actualizadas: ". $resul->rowCount();
                    };
                }else{
                    echo "El usuario no existe, se creara<br>";
                    $ins = "insert into usuarios(nombre, clave, rol)
                            values ('$user', '$cont', '$rol')";
                    $resul = $db->query($ins);
                    if (!$resul) {
                        echo "Error: ". print_r($bd->errorInfo());
                    }else{
                        echo "Inserccion realizada con exito, filas insertadas: ". $resul->rowCount();
                    }    
                }
            }else{
                echo "Todos los campos son iguales, no se hara ninguna accion";
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