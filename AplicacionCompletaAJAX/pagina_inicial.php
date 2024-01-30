<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina web con AJAX</title>
    <script src="js/funciones.js"></script>
</head>
<body>

    <section id = "login">

        <form onsubmit="return login();">
            Usuario	<input id = "correo" type = "text">			
            Clave	<input id = "clave" type = "password">					
            <input type = "submit">
        </form>
       <button><a onclick="return registro();">Registrarse</a></button> 
    </section>

    <section id = "principal" style="display:none">

        <header>
            <?php require 'cabecera.php' ?>
        </header>

        <h2 id = "titulo"></h2>

        <section id = "contenido"></section>

    </section>	

</body>
</html>