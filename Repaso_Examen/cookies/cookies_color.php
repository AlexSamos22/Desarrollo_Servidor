<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['valor'])) {
        $valor = $_POST['valor'];
            setcookie("visitas", $valor, time()+3600*24);
            echo "El color elegido es: $valor";
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
            <input name="valor" type="text">
            <input type="submit">
        </form>
    </body>
</html>