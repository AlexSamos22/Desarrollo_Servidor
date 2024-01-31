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
        $admin = "SELECT ID_Admin, correo, contraseña FROM administrador";
       
        $resul1 = $bd->query($admin);
        $resul = $bd->query($user);

        foreach ($resul as $fila) {
           if($fila['correo'] === $correo and password_verify($cont, $fila['contraseña'])) {
            $arr [] = $fila['correo'];
            $arr [] = $fila['contraseña'];
            $arr [] = 2;
            $arr [] = $fila['ID_Cliente'];
            $encontrado = true;
           }
        }

        foreach ($resul1 as $fila) {
            if($fila['correo'] === $correo and password_verify($cont, $fila['contraseña'])) {
             $arr [] = $fila['correo'];
             $arr [] = $fila['contraseña'];
             $arr [] = 1;
             $arr [] = $fila['ID_Admin'];
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
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);
        $texto_in = implode(",", $codigosProductos);
        if($texto_in==NULL) return FALSE;
        $ins = "select ID_Producto, nombre, precio from producto where ID_Producto in($texto_in)";
        $resul = $bd->query($ins);	
        if (!$resul) {
            return FALSE;
        }
        return $resul;	
    }

    function insertar_pedido($carrito, $codCliente){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);
        $bd->beginTransaction();
        $fechaRecibido = new DateTime(); // Fecha actual
        $fechaRecibidoStr = $fechaRecibido->format('Y-m-d'); // Formatear a 'Y-m-d'

        $fechaEnviado = clone $fechaRecibido; // Crear una copia de la fecha actual
        $fechaEnviado->modify('+5 days'); // Sumar 5 días

        $fechaEnviadoStr = $fechaEnviado->format('Y-m-d'); // Formatear a 'Y-m-d'

        $insPedido = " INSERT INTO pedido (Fecha_Recibido, Fecha_Enviado, Cliente) values ('$fechaRecibidoStr', '$fechaEnviadoStr','$codCliente')";

        $result = $bd ->query($insPedido);
        if (!$result) {
            return FALSE;
        }

        $idPedido = $bd->lastInsertId();

        foreach($carrito as $codProd=>$unidades){
            $insIcnluye = "insert into incluye(ID_Pedido, ID_Producto, Unidades) 
                        values('$idPedido', '$codProd', '$unidades')";

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

    
    function anadirStock($codAdmin, $codProducto, $unidades){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);

        //Insertar reabastecimiento en tabla reabastece
        $insReabastece = "INSERT INTO reabastece(ID_Producto, ID_Admin, Unidades) VALUES ('$codProducto', '$codAdmin', '$unidades')";

        $result = $bd->query($insReabastece);

        if (!$result) {
            return false;
        }

        //Actualizar stock de la tabla producto

        $updStock = "UPDATE producto set stock = stock + '$unidades' WHERE ID_Producto = '$codProducto'";

        $result = $bd->query($updStock);

        if (!$result) {
            return false;
        }

        return true;
    }

    function anadirProducto($nombre, $stock, $precio, $cat){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);

        //Insertar producto nuevo en la tabla
        $insProducto = "insert into producto(Nombre, Stock, Precio, ID_Cat) values ('$nombre', '$stock', '$precio', '$cat')";

        $result = $bd->query($insProducto);

        if (!$result) {
            return false;
        }

        return true;
    }

    function eliminarProducto($cat){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);

        //Sacar productos de la categoria seleccionada
        $productos = "SELECT * from producto where ID_Cat = '$cat'";

        $result = $bd->query($productos);
        if(!$result){
            return false;
        }

        return $result;
    }

    function cargar_clientes(){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);

        $clientes = "select * from cliente";

        $result = $bd->query($clientes);
        if(!$result){
            return false;
        }

        return $result;
    }

    function cargar_administradores(){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);

        $clientes = "select * from administrador";

        $result = $bd->query($clientes);
        if(!$result){
            return false;
        }

        return $result;
    }

    function add_Cat($nombre){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);

        $cat = "insert into categoria(nombre) values('$nombre')";

        $result = $bd->query($cat);

        if (!$result) {
            return false;
        }

        return true;
    }

    function cargar_historial_pedidos($id_cliente){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);

        $select = "select c.ID_Cliente, i.*, po.Nombre 
                    FROM cliente c
                    JOIN pedido p ON c.ID_Cliente = p.Cliente
                    JOIN incluye i ON p.ID_Pedido = i.ID_Pedido
                    JOIN producto po ON po.ID_Producto = i.ID_Producto
                    WHERE c.ID_Cliente = '$id_cliente';";

        $pedidos = $bd->query($select);

        if (!$pedidos) {
            return false;
        }

        if ($pedidos->rowCount() == 0) {
            return false;
        }

        return $pedidos;
       
    }

    function comprobar_sesion(){
        session_start();
        if(!isset($_SESSION['usuario']) && !isset($_SESSION['admin'])){	
            return false;
        }else{
            return true;
        }		
    }

    function registro($nombre, $apellidos, $correo, $cont){
            $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
            $db = new PDO($res[0], $res[1], $res[2]);
            $contrasenaCifrada = password_hash($cont, PASSWORD_DEFAULT);
    
            $ins = "INSERT INTO cliente(nombre, apellidos, correo, contraseña) values('$nombre', '$apellidos', '$correo', '$contrasenaCifrada')";
    
            $result = $db->query($ins);
    
            if ($result) {
                return true;
            }else{
                return false;
            }
    }

    function mod_cliente($codigo, $nombre, $apellidos, $correo, $cont){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");

        $db = new PDO($res[0], $res[1], $res[2]);

        $comprobarExistencia = "SELECT ID_Cliente, nombre, apellidos, correo, contraseña FROM cliente where ID_Cliente = '$codigo'";
        $existe = $db->query($comprobarExistencia);

        foreach ($existe as $row) {
            if ($nombre === $row['nombre'] and $apellidos === $row['apellidos'] and $correo === $row['correo'] and password_verify($cont, $row['contraseña'])) {
                return false;
            }else{
                $contrasenaCifrada = password_hash($cont, PASSWORD_DEFAULT);
                $upd = "UPDATE cliente set nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', contraseña = '$contrasenaCifrada'  WHERE ID_Cliente = '$codigo'";

                $result = $db->query($upd);

                if ($result) {
                    return true;
                }else{
                    return false;
                }       
            }
        }
    }

    function mod_admin($codigo, $nombre, $apellidos, $correo, $cont){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $db = new PDO($res[0], $res[1], $res[2]);

        $comprobarExistencia = "SELECT ID_Admin, nombre, apellidos, correo, contraseña FROM administrador where ID_Admin = '$codigo'";
        $existe = $db->query($comprobarExistencia);

        foreach ($existe as $row) {
            if ($nombre === $row['nombre'] and $apellidos === $row['apellidos'] and $correo === $row['correo'] and password_verify($cont, $row['contraseña'])) {
                return false;
            }else{
                $contrasenaCifrada = password_hash($cont, PASSWORD_DEFAULT);
                $upd = "UPDATE administrador set nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', contraseña = '$contrasenaCifrada'  WHERE ID_Admin = '$codigo'";

                $result = $db->query($upd);

                if ($result) {
                    return true;
                }else{
                    return false;
                }   
            }
        }
    }

    function del_cliente($correo){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $db = new PDO($res[0], $res[1], $res[2]);
        $del = "DELETE FROM cliente where correo = '$correo'";

        $result = $db->query($del);

        if ($result->rowCount() > 0) {
            return true;
        }else{
            return false;
        }
    }

    function del_admin($correo){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $db = new PDO($res[0], $res[1], $res[2]);
        $del = "DELETE FROM administrador where correo = '$correo'";

        $result = $db->query($del);

        if ($result->rowCount() > 0) {
            return true;
        }else{
            return false;
        }
    }

    function add_admin($nombre, $apellidos, $correo, $cont){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $db = new PDO($res[0], $res[1], $res[2]);
        $contrasenaCifrada = password_hash($cont, PASSWORD_DEFAULT);

        $ins = "INSERT INTO administrador(nombre, apellidos, correo, contraseña) values('$nombre', '$apellidos', '$correo', '$contrasenaCifrada')";

        $result = $db->query($ins);

        if ($result) {
            return true;
        }else{
            return false;
        }

    }

    function cargar_categorias_productos(){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);
        
        $id_Cat = "SELECT ID_Cat from categoria";

        $result = $bd->query($id_Cat);
        return $result;
    }

    function cargar_info_productos(){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);
        
        $ins = "select ID_Producto, nombre, stock from producto";
        $resul = $bd->query($ins);	
        if (!$resul) {
            return FALSE;
        }
        return $resul;	
    }

    function del_prod($cod){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);    
        $eliminacion = "DELETE from producto where ID_Producto = '$cod'";
    
        $result = $bd->query($eliminacion);
    
        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    function cargar_nombres_cat(){
        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);
        
        $ins = "select nombre from categoria";
        $resul = $bd->query($ins);	
        if (!$resul) {
            return FALSE;
        }
        return $resul;	
    }


?>