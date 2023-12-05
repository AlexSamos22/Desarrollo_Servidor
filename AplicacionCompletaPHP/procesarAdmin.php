<?php
    include "funciones.php";
    comprobar_sesion();
    include "cabecera.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST["accion"];
    $admins = cargar_administradores();
    echo "<h2>Info Administradores</h2><br>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Codigo</th>";
    echo "<th>Nombre</th>";
    echo "<th>Apellidos</th>";
    echo "<th>Correo</th>";
    echo "</tr>";

    foreach ($admins as $row) {
        echo "<tr>";
        echo "<td>" . $row['ID_Admin'] . "</td>";
        echo "<td>" . $row['Nombre'] . "</td>";
        echo "<td>" . $row['Apellidos'] . "</td>";
        echo "<td>" . $row['Correo'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    if ($accion == "modificar") {
        echo "<h2>Modificar administrador</h2>";
        echo "<form method='POST' action='modAdmin.php'>";
            echo "<label for='cod'>Codigo</label>";
            echo "<input id='cod' name='cod' type='number'>";
            echo "<label for='nombre'>Nombre</label>";
            echo "<input id='nombre' name='nombre' type='text'>";
            echo "<label for='apellidos'>Apellidos</label>";
            echo "<input id='apellidos' name='apellidos' type='text'>";
            echo "<label for='correo'>Correo</label>";
            echo " <input id='correo' name='correo' type='text'>";
            echo " <label for='cont'>Contraseña</label>";
            echo "<input id='cont' name='cont' type='password'>";
            echo "<br>";
            echo "<input type='submit' value='Modificar'>";
        echo "</form>";
        echo "<a href='modUsuarios.php'>Volver</a>";
    } elseif ($accion == "eliminar") {
        echo "<h2>Eliminar administrador</h2>";
        echo "<form method='POST' action='eliminarAdmin.php'>";
            echo "<label for='correo'>Correo del cliente</label>";
            echo "<input type='text' id='correo' name='correo'>";
            echo "<br>";
            echo "<input type='submit' value='Eliminar'>";
        echo "</form>";
        echo "<a href='modUsuarios.php'>Volver</a>";
    } elseif ($accion == "añadir") {
        echo "<h2>Añadir administrador</h2>";
        echo "<form method='POST' action='añadirAdmin.php'>";
            echo "<label for='nombre'>Nombre</label>";
            echo "<input id='nombre' name='nombre' type='text'>";
            echo "<label for='apellidos'>Apellidos</label>";
            echo "<input id='apellidos' name='apellidos' type='text'>";
            echo "<label for='correo'>Correo</label>";
            echo " <input id='correo' name='correo' type='text'>";
            echo " <label for='cont'>Contraseña</label>";
            echo "<input id='cont' name='cont' type='password'>";
            echo "<br>";
            echo "<input type='submit' value='Añadir'>";
        echo "</form>";
        echo "<a href='modUsuarios.php'>Volver</a>";
    }
}
?>