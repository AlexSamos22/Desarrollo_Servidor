    <header>
    Usuario: <?php 
  if (isset($_SESSION['usuario'])) {
    echo $_SESSION['usuario'][0] . "<br>";
    } 
    if (isset($_SESSION['admin'])) {
        echo $_SESSION['admin'][0] . "<br>";
    }
    ?>

    <?php
        if (isset($_SESSION['usuario']) and $_SESSION['usuario'][2] == false) {
            echo "<a href='inicioClientes.php'>Home</a>";
        }else{
            echo "<a href='panelControl.php'>Home</a>";
        }
    ?>
    
    <?php
        if (isset($_SESSION['usuario']) and $_SESSION['usuario'][2] == false) {
           echo "<a href='carrito.php'>Ver carrito</a>"; 
        }
    ?>
    <a href="cerrarSesion.php">Cerrar sesión</a>
    </header>
    <hr>
