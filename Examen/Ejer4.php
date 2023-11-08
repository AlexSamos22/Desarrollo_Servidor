<?php
/*
EJERCICIO 4 (2,5 puntos): Realizar un programa que, con un formulario,
nos pida qué tabla de base de datos empresa consultar, y cuando la
seleccionemos nos muestre todos los datos de esa tabla.
*/
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cc = "mysql:dbname=empresa;host=127.0.0.1";
    $user = "root";
    $clave= "";
    $tabla = $_POST['tabla'];
    try {
        $db = new PDO($cc, $user, $clave);
        if ($tabla == "departamentos") {
            $consulta = "SELECT coddept, nombre, jefe, presupuesto, ciudad  FROM $tabla";
            $departamentos = $db->query($consulta);
        
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>CodDepat</th>";
            echo "<th>Nombre</th>";
            echo "<th>Jefe</th>";
            echo "<th>Presupuesto</th>";
            echo "<th>Ciudad</th>";
            echo "</tr>";
        
            foreach ($departamentos as $row) {
                echo "<tr>";
                echo "<td>" . $row['coddept'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['jefe'] . "</td>";
                echo "<td>" . $row['presupuesto'] . "</td>";
                echo "<td>" . $row['ciudad'] . "</td>";
                echo "</tr>";
            }
        
            echo "</table>";
        } elseif ($tabla == "usuarios") {
            $consulta = "SELECT codigo, nombre, clave, rol FROM $tabla";
            $usuarios = $db->query($consulta);
        
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Codigo</th>";
            echo "<th>Nombre</th>";
            echo "<th>Clave</th>";
            echo "<th>Rol</th>";
            echo "</tr>";
        
            foreach ($usuarios as $row) {
                echo "<tr>";
                echo "<td>" . $row['codigo'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['clave'] . "</td>";
                echo "<td>" . $row['rol'] . "</td>";
                echo "</tr>";
            }
        
            echo "</table>";
        } elseif ($tabla == "empleados") {
            $consulta = "SELECT codemple, nombre, apellido1, apellido2, departamento FROM $tabla";
            $empleados = $db->query($consulta);
        
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>CodEmple</th>";
            echo "<th>Nombre</th>";
            echo "<th>Apellido1</th>";
            echo "<th>Apellido2</th>";
            echo "<th>Departamento</th>";
            echo "</tr>";
        
            foreach ($empleados as $row) {
                echo "<tr>";
                echo "<td>" . $row['codemple'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['apellido1'] . "</td>";
                echo "<td>" . $row['apellido2'] . "</td>";
                echo "<td>" . $row['departamento'] . "</td>";
                echo "</tr>";
            }
        
            echo "</table>";
        }
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
    <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title></title>
                <meta name="description" content="">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="">
            </head>
            <body>
                
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"
                method="post">
                <label for="tabla">Introduce la tabla que quieres consultar</label>
                <select name="tabla">
                    <option value="departamentos">Departamentos</option>
                    <option value="usuarios">Usuarios</option>
                    <option value="empleados">Empleados</option>
                </select>
                <br>
                <input type="submit">
                </form>
                
            </body>
        </html>