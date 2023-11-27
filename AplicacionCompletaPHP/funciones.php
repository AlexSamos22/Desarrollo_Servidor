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

        $user = "SELECT ID_Cliente, correo, contraseña FROM cliente";
        $admin = "SELECT correo, contraseña FROM administrador";
       
        $resul1 = $bd->query($admin);
        $resul = $bd->query($user);

        foreach ($resul as $fila) {
           if($fila['correo'] === $correo and password_verify($cont, $fila['contraseña'])) {
            $arr [] = $fila['correo'];
            $arr [] = $fila['contraseña'];
            $arr [] = false;
            $arr [] = $fila['ID_Cliente'];
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

    function cargar_categoria($id_Cat){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);
        $ins = "select nombre from categoria where ID_Cat = $id_Cat";
        $resul = $bd->query($ins);	
        if (!$resul) {
            return FALSE;
        }
        if ($resul->rowCount() === 0) {    
            return FALSE;
        }	

        return $resul->fetch();	
    }

    function productos_categoria($id_Cat){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);	
        $sql = "select * from producto where  ID_Cat = $id_Cat and Stock > 0";	
        $resul = $bd->query($sql);	
        if (!$resul) {
            return FALSE;
        }
        if ($resul->rowCount() === 0) {    
            return FALSE;
        }	

        return $resul;			
    }

    function cargar_productos($codigosProductos){
        $res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);
        $texto_in = implode(",", $codigosProductos);
        if($texto_in==NULL) return FALSE;
        $ins = "select ID_Producto, nombre from producto where codProd in($texto_in)";
        $resul = $bd->query($ins);	
        if (!$resul) {
            return FALSE;
        }
        return $resul;	
    }

    function insertar_pedido($carrito, $codCliente){
        $res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);
        $bd->beginTransaction();
        $fechaRecibido  = date("d-m-Y");
        $fechaEnviado =	date("d-m-Y", strtotime($fechaRecibido . "+5 days"));

        $insPedido = "  INSERT INTO pedido (Fecha_Recivido, Fecha_Enviado, Cliente) values ('$fechaRecibido', '$fechaEnviado','$codCliente' )";

        $result = $bd ->query($insPedido);
        if (!$result) {
            return FALSE;
        }

        $idPedido = $bd->lastInsertId();

        foreach($carrito as $codProd=>$unidades){
            $insIcnluye = "insert into incluye(ID_Pedido, ID_Producto) 
                        values('$idPedido', '$codProd')";

            $resul = $bd->query($insIcnluye);
       
   
            $updProductos = "update producto set stock=stock-$unidades
                            where ID_Producto=$codProd";
   
            $resul1 = $bd->query($updProductos);
   
           if (!$resul || !$resul1) {
               $bd->rollback();
               return FALSE;
           }
       }
       $bd->commit();
       return $idPedido;

    }

    function comprobar_sesion(){
        session_start();
        if(!isset($_SESSION['usuario']) && !isset($_SESSION['admin'])){	
            header("Location: login.php?redirigido=true");
            exit;
        }		
    }

?>