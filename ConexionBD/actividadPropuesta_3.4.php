<?php
    if (isset($_POST['cod'])) {
        
        $cc = 'mysql:dbname=empresa;host=127.0.0.1';
        $user = 'root';
        $clave = '';
        try {
            $bd = new PDO($cc, $user, $clave);
            echo "Conexion realizada con exito: <br>";
            $bool = false;
            $sql = 'SELECT codigo, nombre, clave, rol FROM usuarios';
            $usuarios = $bd ->query($sql);
            foreach($usuarios as $row){
                if ($_POST['cod'] == $row['codigo']) {
                    echo "El usuario es: ";
                    echo "<br>";
                    echo "Codigo: \t";
                    print $row['codigo']. "\t";
                    echo "<br>";
                    echo "Nombre: \t";
                    print $row['nombre']. "\t";
                    echo "<br>";
                    echo "Clave: \t";
                    print $row['clave']. "\t";
                    echo "<br>";
                    echo "Rol: \t";
                    print $row['rol']. "\t";
                    $bool = true;
                }
            }

            if(!$bool){
                echo "Usuario no encontrado";
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
        <label for="user">Ingrese el codigo del usuario</label>
        <input name="cod" id="cod" type="text">
        <br>
        <input type="submit">
        </form>
    </body>
</html>