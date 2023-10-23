<?php
    if (isset($_POST['user']) and isset($_POST['clave']) and isset($_POST['rol'])) { 
        $cc = 'mysql:dbname=empresa;host=127.0.0.1';
        $user = 'root';
        $clave = '';
        try {
            $bd = new PDO($cc, $user, $clave);
            $bool = false;
            $accion = false;
            echo "Conexion realizada con exito: <br>";
            $sql = 'SELECT nombre, clave, rol FROM usuarios';
            $usuarios = $bd ->query($sql);
            foreach($usuarios as $row){
                if ($_POST['user'] == $row['nombre']){
                    echo "El usuario ya existe se modificaran los campos que sean distintos<br>";
                    if ($_POST['user'] == $row['nombre'] and $_POST['clave'] == $row['clave'] and $_POST['rol'] == $row['rol']) {
                       echo "Los campos son iguales no se actualizara nada";
                       $bool = true;
                    }else{
                        $accion = true;
                    }
                }
            }

            if (!$bool) {
                if ($accion) {
                    $usuario = $_POST['user'];
                    $claveUser = $_POST['clave'];
                    $rol = $_POST['rol'];
                    $upd = "update usuarios set rol = '$rol', clave = '$claveUser'  where nombre = '$usuario'";
                    $resul = $bd->query($upd);
                    if (!$resul) {
                        echo "Error: ". print_r($bd->errorInfo());
                        
                    }else{
                    echo "Actualizacion realizada con exito, filas actualizadas: ". $resul->rowCount();
                    };
                }else{
                    echo "Se creara el usuario con los datos introducidos <br>";
                    $usuario = $_POST['user'];
                    $claveUser = $_POST['clave'];
                    $rol = $_POST['rol'];
                    $ins = "insert into usuarios (nombre, clave, rol)
                    values('$usuario', '$claveUser', '$rol')";
                    $resul = $bd->query($ins);
                    if (!$resul) {
                        echo "Error: ". print_r($bd->errorInfo());
                    }else{
                        echo "Inserccion realizada con exito, filas insertadas: ". $resul->rowCount();
                    }    
                    
                };
                
            }; 

        } catch (PDOException $e) {
            echo "Error con la base de datos: ". $e->getMessage();
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
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>"
        method="post">
        <label for="user">Ingrese el nomnre del usuario</label>
        <input name="user" id="user" type="text">
        <br>
        <label for="cont">Ingrese la clave del usuario</label>
        <input name="clave" id="clave" type="text">
        <br>
        <label for="cont">Ingrese el rol del usuario</label>
        <input name="rol" id="rol" type="text">
        <br>
        <input type="submit">
        </form>
    </body>
</html>