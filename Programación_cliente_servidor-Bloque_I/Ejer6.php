<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['num']) and !empty($_POST['num'])) {
           for ($i=1; $i <= $_POST['num'] ; $i++) { 
                echo $i." ";
           }
           echo "<br>";
           echo "<a href='Ejer6.php'> Volver </a>";
        }else{
            echo "El campo esta vacio <br>";
            echo "<a href='Ejer6.php'> Volver </a>";
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
                        <label for="num">Introduce un numero</label>
                        <input name="num" id="num" type="number">
                        <input type="submit">
                    </form>

                </body>
            </html>
   <?php } ?>


