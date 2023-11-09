<?php
    function leer_configuracion($nombre, $esquema) {
        $config = new DOMDocument();
        $config -> load($nombre);
        $res = $config -> schemaValidate($esquema);
        if ($res === FALSE) {
            throw new InvalidArgumentException("Revise fichero de configuración");
        }
        $datos = simplexml_load_file($nombre);
        $ip = $datos -> xpath("//ip");
        $nombre = $datos -> xpath("//nombre");
        $usu = $datos -> xpath("//usuario");
        $clave = $datos -> xpath("//clave");
        $cad = sprintf("mysql:dbname=%s;host=%s", $nombre[0], $ip[0]);
        $resul = [];
        $resul[] = $cad;
        $resul[] = $usu[0];
        $resul[] = $clave[0];
        return $resul;
    }

    function cargar_categorias() {
        $res = leer_configuracion(dirname(__FILE__)."/configuracion.xml",
        dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);
        $ins = "SELECT codCat, nombre from categorias";
        $resul = $bd -> query($ins);
        if (!$resul) {
            return FALSE;
        }
        if($resul -> rowCount() === 0) {
            return FALSE;
        }
        return $resul;
    }
    function comprobar_usuario($nombre, $clave) {
        $res = leer_configuracion(dirname(__FILE__)."/configuracion.xml",
        dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);
        $ins = "SELECT codRes, correo from restaurantes WHERE correo='$nombre' AND clave='$clave'";
        $resul = $bd -> query($ins);
        if($resul -> rowCount() === 1) {
            return $resul -> fetch();
        } else {
            return FALSE;
        }

    }
?>