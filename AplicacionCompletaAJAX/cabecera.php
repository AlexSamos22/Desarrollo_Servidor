<header>
    <span id="cab_usuario"></span>	
    <?php
    require "bd.php";
    if (!comprobar_sesion()) {
        return;
    }

    if (isset($_SESSION['usuario']) && $_SESSION['usuario'][2] == 2) {
        echo "<a href='#' onclick='inicioClientes();'>Home</a>";
        echo "<a href='#' onclick='cargarCarrito();'>Carrito</a>";
    }else{
        echo "<a href='#' onclick='inicioAdmin();'>Home</a>";
    }
    ?>
    <a href="#" onclick="cerrarSesion();">Cerrar sesión</a>
</header>
<hr>
<?php
if (isset($_SESSION['usuario']) && $_SESSION['usuario'][2] == 2) {
    $funcion = "inicioClientes()";
}else{
    $funcion = "inicioAdmin()";
}

?>
<script><?php echo $funcion; ?></script>
