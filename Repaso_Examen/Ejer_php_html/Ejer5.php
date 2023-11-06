<?php
/*
Dados tres valores $A, $B y $C; escriba un programa para ordenarlos e imprimirlos de forma descendente.
*/
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['A']) and isset($_POST['B']) and isset($_POST['C']) ) {
        $A = $_POST['A'];
        $B = $_POST['B'];
        $C = $_POST['C'];
        $arr = [$A, $B, $C];
        rsort($arr);
        echo "Valores ordenados de forma descendente<br>";
        foreach ($arr as $value) {
            echo $value . "<br>";
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
        <input name="A" type="number">
        <br>
        <input name="B" type="number">
        <br>
        <input name="C" type="number">
        <br>
        <input type="submit">
        </form>
    </body>
</html>