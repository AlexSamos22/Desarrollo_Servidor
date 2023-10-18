<?php
    if (isset($_POST['user']) and isset($_POST['cont'])) {
        
        $cc = 'mysql:dbname=empresa;host=127.0.0.1';
        $user = 'root';
        $clave = '';
        try {
            $bd = new PDO($cc, $user, $clave);
            echo "Conexion realizada con exito: <br>";
            $bool = false;
            $sql = 'SELECT nombre, clave FROM usuarios';
            $usuarios = $bd ->query($sql);
            foreach($usuarios as $row){
                if ($_POST['user'] == $row['nombre'] and $_POST['cont'] == $row['clave']) {
                    echo "El usuario y contraseña del usuario: ";
                    print $row['nombre']. "\t";
                    echo " son correctos";
                    $bool = true;
                }
            }

            if(!$bool){
                echo "Usuario o contraseña incorrectos";
            }

            
        } catch (PDOException $th) {
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
        <label for="user">Ingrese el usuario</label>
        <input name="user" id="user" type="text">
        <br>
        <label for="cont">Ingrese la contraseña</label>
        <input name="cont" id="cont" type="text">
        <br>
        <input type="submit">
        </form>
    </body>
</html>