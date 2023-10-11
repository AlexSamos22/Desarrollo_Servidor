<?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['num1']) and isset($_POST['num2'])) {
            if ($_POST['num1'] > $_POST['num2']) {
            echo "El numero". $_POST['num1'] . " es mayor que el ". $_POST['num2'];
            }else{
                echo "El numero". $_POST['num2'] . " es mayor que el ". $_POST['num1'];
            }
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
            method="post">
            <label for="num1">Numero 1</label>
            <input name="num1" id="num1" type="number">
            <label for="num2">Numero 2</label>
            <input name="num2" id="num2" type="number">
            <input type="submit">
        </form>
    </body>
</html>