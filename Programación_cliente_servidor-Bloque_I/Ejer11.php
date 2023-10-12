<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['frase1']) and !empty($_POST['frase1']) and isset($_POST['frase2']) and !empty($_POST['frase2'])) {
            if ($_POST['frase1'] === $_POST['frase2']) {
                echo "Las 2 frases son iguales <br>";
                echo "<a href='Ejer11.php'> Volver </a>";
            }else{
                echo "Las frases no son iguales <br>";
                echo "<a href='Ejer11.php'> Volver </a>";
            }
        }else{
            echo "Uno de los campos esta vacio <br>";
            echo "<a href='Ejer11.php'> Volver </a>";
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
                        <label for="frase1">Introduce la primera frase</label>
                        <input name="frase1" id="frase1" type="text">
                        <br>
                        <label for="frase2">Introduce la segunda frase</label>
                        <input name="frase2" id="frase2" type="text">
                        <br>
                        <input type="submit">
                    </form>
                </body>
            </html>

 <?php   } ?>
    


