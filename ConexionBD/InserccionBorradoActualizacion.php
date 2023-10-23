<?php
    //datos conexion
    $cc = 'mysql:dbname=empresa;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';

    try {
        //conectar
        $db = new PDO($cc, $usuario, $clave);
        echo "Conexion realizada con exito <br>";

        //INSERTAR NUEVO USUARIO
        $ins = "insert into usuarios(nombre, clave, rol)
                values('Alberto', '3333', '1')";
        $resul = $db->query($ins);

        //comprobar errores
        if ($resul) {
            echo "insert correcto <br";
            echo "Filas insertadas: ". $resul->rowCount(). "<br>";
        }else{
            print_r($bd->errorinfo());
        };

        //UPDATE
        echo "Codigo de fila insertada".$bd->lastInsertId()."<br>";

        //actualizar
        $upd = "update usuarios set rol = 0 where rol = 1";
        $resul = $db->query($upd);

        //comprobar errores
        if ($resul) {
            echo "update correcto <br";
            echo "Filas actualizadas: ". $resul->rowCount(). "<br>";
        }else{
            print_r($bd->errorinfo());
        };

        //BORRAR
        $del = "delete from usuarios where nombre = 'Luisa'";
        $resul = $db->query($del);

        //comprobar errores
        if ($resul) {
            echo "delete correcto <br";
            echo "Filas borradas: ". $resul->rowCount(). "<br>";
        }else{
            print_r($bd->errorinfo());
        };
    } catch(PDOException $e) {
        echo "Error en la base de datos: ". $e->getMessage();
    }
?>