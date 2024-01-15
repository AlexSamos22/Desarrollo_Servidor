function categorias() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function (){
        //crear lista
        var lista = document.createElement("ul");
        //meter los datos de la respuesta a un array
        var cats = JSON.parse(this.response);
        //para cada elemento del array
        for (let i = 0; i < cats.length; i++) {
            //se crea un elemento li con el campo nombre
            var elem = document.createElement("li");

            //Se crea el enlace a
            var a = document.createElement("a");

            //Se indica la ruta que va a tener
            a.href="productos.php?categoria?" + cats[i]["Cod"];

            //Se le añade a cada enlace el nombre de la categoria
            a.textContent = cats[i]["nombre"];

            //Se añade a cada elemento li el enlace con el nombre
            elem.appendChild(a);

            //se añade a la lista
            lista.appendChild(elem);
        }

        var body = document.getElementById("principal");
        //eliminar el contenido actual
        body.innerHTML = "";
        body.appendChild(lista);

        
    };

    xhttp.open("GET", "datos_categorias_json.php", true);
    xhttp.send();
    return false;
}

function loadDoc() {
    var xhttp = new XMLHttpRequest(); 
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { 
            document.getElementById("hora").innerHTML = "Hora en el servidor:" + this.responseText;
        }
    };

    xhttp.open("GET", "hora_servidor.php", true); 
    xhttp.send();
    return false;
}