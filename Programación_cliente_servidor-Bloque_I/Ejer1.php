<?php
    include "/xampp/htdocs/Entorno_servidor/librerias/operaciones.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (is_numeric($_POST['num1']) and is_numeric($_POST['num2'])) {
            echo "La suma de los numeros ". $_POST['num1']. " y ". $_POST['num2']. "  es: ". $_POST['num1'] + $_POST['num2']."<br>";
            echo "<a href='Ejer1.php'> Volver </a>";
        }
    }else{
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
    <?php 
            
        } ?>
    


