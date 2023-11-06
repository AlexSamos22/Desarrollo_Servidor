<?php
/*
Elabore un programa que imprima la figura de un triángulo rectángulo ajustada a la izquierda, formada por asteriscos. 
El lado del triángulo se lee como dato.
*/
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['lado'])) {
        $A = $_POST['lado'];
        
        for ($i=1; $i <= $A ; $i++) { 
            for ($j=1; $j <= $i * 2 -1 ; $j++) { 
                echo "*";
            }
            echo "<br>";
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
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>"
        method="post">
        <input name="lado" type="number">
        <br>
        <input type="submit">
        </form>
    </body>
</html>