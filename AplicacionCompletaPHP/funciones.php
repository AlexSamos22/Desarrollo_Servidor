<?php
   function configuracionBaseDatos($nombre, $esquema){
        $config = new DOMDocument();
        $config->load($nombre);
        $res = $config->schemaValidate($esquema);
        if ($res===FALSE){ 
        throw new InvalidArgumentException("Revise fichero de configuración");
        } 		
        $datos = simplexml_load_file($nombre);	
        $ip = $datos->xpath("//ip");
        $nombre = $datos->xpath("//nombre");
        $usu = $datos->xpath("//usuario");
        $clave = $datos->xpath("//clave");	
        $cad = sprintf("mysql:dbname=%s;host=%s", $nombre[0], $ip[0]);
        $resul = [];
        $resul[] = $cad;
        $resul[] = $usu[0];
        $resul[] = $clave[0];
        return $resul;
   }
   
   function comprobar_usuario($correo, $cont){
        $encontrado = false;
        $arr = [];
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	    $bd = new PDO($res[0], $res[1], $res[2]);

        $user = "SELECT correo, contraseña FROM cliente";
        $admin = "SELECT correo, contraseña FROM administrador";
       
        $resul1 = $bd->query($admin);
        $resul = $bd->query($user);

        foreach ($resul as $fila) {
           if($fila['correo'] === $correo and password_verify($cont, $fila['contraseña'])) {
            $arr [] = $fila['correo'];
            $arr [] = $fila['contraseña'];
            $arr [] = false;
            $encontrado = true;
           }
        }

        foreach ($resul1 as $fila) {
            if($fila['correo'] === $correo and password_verify($cont, $fila['contraseña'])) {
             $arr [] = $fila['correo'];
             $arr [] = $fila['contraseña'];
             $arr [] = true;
             $encontrado = true;
            }
         }

        if ($encontrado) {
            return $arr;
        }else{
            return false;
        }
    }

    function cargar_categorias(){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	    $bd = new PDO($res[0], $res[1], $res[2]);

        $cat = "SELECT id_cat, nombre FROM categoria";

        $resul = $bd->query($cat);

        if (!$resul) {
            return FALSE;
        }

        if($resul->rowCount() === 0){
            return FALSE;
        }

        return $resul;
    }


    function comprobar_sesion(){
        session_start();
        if(!isset($_SESSION['usuario']) && !isset($_SESSION['admin'])){	
            header("Location: login.php?redirigido=true");
            exit;
        }		
    }

?>