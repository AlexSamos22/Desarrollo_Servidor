<?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['num']) and $_POST['num'] > 0) {
           for ($i=1; $i <= 10 ; $i++) { 
                echo $_POST['num'] . " x " .  $i . " = " . $i * $_POST['num']. "<br>";
           }
        }else{
            $err = true;
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
    <?php
            if (isset($err)) {
                echo "<p> Debes introducir un numero valido </p>";
            }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
            method="post">
            <label for="num">Indique el numero</label>
            <input name="num" id="num" type="number">
            <input type="submit">
        </form>
    </body>
</html>