<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if (isset($_POST['n'])){
            
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
                <label for="n">Introduce el valor de n</label>
                <input id="n" name="n" type="number" required>
                <br>
                <input type="submit">
            </form>
        </body>
    </html>
  <?php  }?>