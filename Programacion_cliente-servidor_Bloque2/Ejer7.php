<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $n = $_POST["n"];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tabla de Cuadrados y Cubos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>
<body>
    <h1>Tabla de Cuadrados y Cubos</h1>

    <table border="1">
        <tr>
            <th>Número</th>
            <th>Cuadrado</th>
            <th>Cubo</th>
        </tr>

        <?php
        for ($i = 1; $i <= $n; $i++) {
            $cuadrado = $i ** 2;
            $cubo = $i ** 3;
            echo "<tr>
                    <td>$i</td>
                    <td>$cuadrado</td>
                    <td>$cubo</td>
                  </tr>";
        }
        
        ?>

    </table>
    <a href='Ejer7.php'>Volver</a>";
</body>
</html>

<?php
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tabla de Cuadrados y Cubos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="n">Introduce el valor de n</label>
        <input id="n" name="n" type="number" required>
        <br>
        <input type="submit">
    </form>
</body>
</html>
<?php
}
?>
