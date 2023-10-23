<?php
    //datos conexion
    $cc = 'mysql:dbname=empresa;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';

    try {
        //conectar
        $db = new PDO($cc, $usuario, $clave);
        echo "Conexion realizada con exito <br>";

        //TRANSACCIONES
        $db->beginTransaction();
        $ins = "insert into usuarios (nombre, clave, rol)
                values('Fernando', '33333', '1')";
        $resul = $db->query($ins);
        //Se repite la consulta para que de error
        $resul = $db->query($ins);
        //comprobar errores
        if (!$resul) {
            echo "Error: ". print_r($db->errorInfo());
            //Deshacer el cambio
            $db->rollBack();
        }else{
            //Sale bien
            $db->commit();
        };
    } catch(PDOException $e) {
        echo "Error en la base de datos: ". $e->getMessage();
    }
?>