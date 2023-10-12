<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['num1']) and !empty($_POST['num1']) and isset($_POST['num2']) and !empty($_POST['num2'])) {
           if (is_numeric($_POST['num1']) and is_numeric($_POST['num2'])) {
                    $division = $_POST['num1'] / $_POST['num2'];
                    echo "El resultado de dividir ". $_POST['num1'] . " y " . $_POST['num2'] . " es: $division <br>";
                    echo "<a href='Ejer15.php'> Volver </a>";
                }else{
                    echo "Uno de los valores no es un numero<br>";
                    echo "<a href='Ejer15.php'> Volver </a>";
                }
           }else{
                echo "No se puede dividir entre 0<br>";
                echo "<a href='Ejer15.php'> Volver </a>";
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
                        <input name="num1" id="num1" type="text">
                        <br>
                        <label for="num2">Numero 2</label>
                        <input name="num2" id="num2" type="text">
                        <br>
                        <input type="submit">
                    </form>

                </body>
            </html>
  <?php  } ?>
    


