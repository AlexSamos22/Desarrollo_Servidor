<?php
/*comprueba que el usuario haya abierto sesión o redirige*/ 
require '..\correo\enviar_correo.php';
require 'sesiones.php'; 
require_once 'bd.php'; 
comprobar_sesion();

?>
<!DOCTYPE html>
    <html>
    <head>
    <meta charset = ªUTF-8">
    <title>Pedidos</title>
    </head>
    <body>
        <?php
        require 'cabecera.php';
        $resul = insertar_pedido($_SESSION['carrito']);
        $_SESSION['usuario']['codRes']; 
        if ( $resul === FALSE){
            echo "No se ha podido realizar el pedido<br>";
        }else{
            $correo = $_SESSION['usuario']['correo']; 
            echo "Pedido realizado correctamente<br>";
            //vaciar carrito
            $compra = $_SESSION['carrito'];
            $_SESSION['carrito'] = [];
            echo "Pedido realizado con éxito.
            Se enviará un correo de confirmación a: $correo ";
            enviar_correo($compra,$pedido, $correo);
        }
        ?>
    </body>
</html>
