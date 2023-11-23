<?php
include "funciones.php";
comprobar_sesion();
include "cabecera.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $opcion = $_POST["opcion"];

        if ($opcion == "cliente") {
            echo "<h2>Opción Cliente Seleccionada</h2>";
            echo "<form method='POST' action='procesarCliente.php'>";
            echo "<label for='accion'>Elige una acción:</label>";
            echo "<select id='accion' name='accion'>";
            echo "<option value='modificar'>Modificar</option>";
            echo "<option value='eliminar'>Eliminar</option>";
            echo "</select>";
            echo "<input type='submit' value='Continuar'>";
            echo "</form>";
        } elseif ($opcion == "admin") {
            echo "<h2>Opción Administrador Seleccionada</h2>";
            echo "<form method='POST' action='procesarAdmin.php'>";
            echo "<label for='accion'>Elige una acción:</label>";
            echo "<select id='accion' name='accion'>";
            echo "<option value='modificar'>Modificar</option>";
            echo "<option value='eliminar'>Eliminar</option>";
            echo "<option value='añadir'>Añadir</option>";
            echo "</select>";
            echo "<input type='submit' value='Continuar'>";
            echo "</form>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Opciones</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="opcion">Elige una opción:</label>
        <select id="opcion" name="opcion">
            <option value="cliente">Cliente</option>
            <option value="admin">Administrador</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
