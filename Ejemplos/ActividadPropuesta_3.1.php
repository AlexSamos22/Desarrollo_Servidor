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
            if (!is_numeric($_GET["num1"]) or !is_numeric($_GET["num2"])) {
                echo "Uno de los valores no es un numero";
            }else if (empty($_GET["num1"]) or empty($_GET["num2"])){
                echo "Uno de los valores esta vacio";
            }else{
                echo "La suma de los numeros es: ".$_GET["num1"] + $_GET["num2"];
            }
        ?>
        
        <script src="" async defer></script>
    </body>
</html>