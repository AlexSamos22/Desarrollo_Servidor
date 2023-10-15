<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if (isset($_POST['numero1']) and isset($_POST['numero2']) and isset($_POST['numero3'])){
           if (is_numeric($_POST['numero1']) and is_numeric($_POST['numero2']) and is_numeric($_POST['numero3'])) {
            $num1 = $_POST['numero1'];
            $num2 = $_POST['numero2'];
            $num3 = $_POST['numero3'];    
            $arr = array($num1, $num2, $num3);

            rsort($arr);
            
            echo "Valores ordenados de forma descendente <br>";

            foreach ($arr as $value) {
                echo "$value <br>";
            }
            echo "<a href='Ejer5.php'>Volver</a>";
           }else{
            echo "Uno de los valores no es un numero <br>";
            echo "<a href='Ejer5.php'>Volver</a>";
           }
        }else{
            echo "<a href='Ejer5.php'>Volver</a>";
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
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"
            method="post">
                <label for="numero1">Numero 1</label>
                <input id="numero1" name="numero1" type="text" required>
                <br>
                <label for="numero2">Numero 2</label>
                <input id="numero2" name="numero2" type="text" required>
                <br>
                <label for="numero3">Numero 3</label>
                <input id="numero3" name="numero3" type="text" required>
                <br>
                <input type="submit">
            </form>
        </body>
    </html>
  <?php  }?>