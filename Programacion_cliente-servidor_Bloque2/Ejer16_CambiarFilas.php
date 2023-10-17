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
        $numFilas = count($matriz);

        echo "<h2>Matriz Original</h2>";
        echo "<table border='1'>";
        for ($i = 0; $i < $n; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $n; $j++) {
                echo "<td>" . $matriz[$i][$j] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";


        $matrizInvertida = array();
        for ($i= $numFilas - 1; $i >= 0  ; $i--) { 
            $matrizInvertida[]= $matriz[$i];
        }

        echo "<hr>Matriz invertida</h2>";
        echo "<table border='1'>";
        for ($i = 0; $i < $n; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $n; $j++) {
                echo "<td>" . $matrizInvertida[$i][$j] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
