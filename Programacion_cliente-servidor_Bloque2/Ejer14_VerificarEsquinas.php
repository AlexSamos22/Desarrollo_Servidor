<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $n = $_POST['n'];
        $matriz = $_POST['dato'];
        $valorCentral = $matriz[($n -1)  / 2][($n -1) / 2];
        $contador = 0;

        echo "<h2>Matriz A:</h2>";
        echo "<table border='1'>";
        for ($i = 0; $i < $n; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $n; $j++) {
                echo "<td>" . $matriz[$i][$j] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<h2>Valor Central:</h2>";
        echo "<p>El valor central de la matriz es: $valorCentral</p>";

        // Verificar las esquinas de la matriz
        if ($matriz[0][0] == $valorCentral) $contador++;
        if ($matriz[0][$n - 1] == $valorCentral) $contador++;
        if ($matriz[$n - 1][0] == $valorCentral) $contador++;
        if ($matriz[$n - 1][$n - 1] == $valorCentral) $contador++;

        echo "<p>Número de esquinas iguales al valor central: $contador</p>";
    }
    ?>
</body>
</html>
