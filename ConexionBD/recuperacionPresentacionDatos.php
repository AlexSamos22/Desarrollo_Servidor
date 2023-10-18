<?php
    $cc = 'mysql:dbname=empresa;host=127.0.0.1';
    $user = 'root';
    $clave = '';
    try {
        $bd = new PDO($cc, $user, $clave);
        echo "Conexion realizada con exito: ";
        $sql = 'SELECT nombre, clave, rol FROM usuarios';
        $usuarios = $bd ->query($sql);
        echo $usuarios->rowCount()."<br>";
        foreach($usuarios as $row){
            print $row['nombre']. "\t";
            print $row['clave']. "\t";
            echo "<br>";
        }

        $preparada = $bd ->prepare("select nombre from usuarios where rol = ?");
        $preparada->execute(array(0));
        echo "Usuarios con rol 0: ". $preparada->rowCount()."<br>";
        foreach ($preparada as $usu) {
            print "Nombre: ". $usu['nombre']. "<br>";
        }

        $preparada_nombre = $bd->prepare("select nombre from usuarios where rol =: rol");
        $preparada_nombre->execute(array(':rol => 0'));
        echo "Usuarios con rol 0: ". $preparada->rowCount(). "<br>";
        foreach ($preparada_nombre as $usu) {
            print "Nombre: ". $usu['nombre']. "<br>";
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
?>