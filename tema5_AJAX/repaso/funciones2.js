function horaServidor() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("hora").innerHTML = "Hora del servidor " + this.responseText;
        }
    };
    xhttp.open("GET", "hora_servidor.php", true);
    xhttp.send();
    return false;
}

function cargarCat() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function (){
        if (this.readyState == 4 && this.status == 200) {
            let lista = document.createElement("ul");
            let categorias = JSON.parse(this.responseText);

            for (let i = 0; i < categorias.length; i++) {
                let item = document.createElement("li");
                item.innerHTML = categorias[i]["nombre"];

                lista.appendChild(item);
            }

            let seccion = document.getElementById("cambiar");
            seccion.innerHTML = "";
            seccion.appendChild(lista);
        }
    };

    xhttp.open("GET", "datos_categoria_json.php", true);
    xhttp.send();
    return false;
}

function cargarCatEnlaces() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function (){
        if (this.readyState == 4 && this.status == 200) {
            let lista = document.createElement("ul");
            let categorias = JSON.parse(this.responseText);

            for (let i = 0; i < categorias.length; i++) {
                let item = document.createElement("li");
                let link = document.createElement("a");
                link.href = "productos.php?categoria="+ categorias[i]["cod"];
                link.innerHTML = categorias[i]["nombre"];
                item.appendChild(link);
                lista.appendChild(item);
            }

            let seccion = document.getElementById("cambiar");
            seccion.innerHTML = "";
            seccion.appendChild(lista);
        }
    };
    
    xhttp.open("GET", "datos_categoria_json.php", true);
    xhttp.send();
    return false;
}

function cargarCatTabla() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function (){
        if (this.readyState == 4 && this.status == 200) {
            let tabla = document.createElement("table");
            let categorias = JSON.parse(this.responseText);

            // Crear la cabecera de la tabla
            let cabecera = document.createElement("tr");

            // Agregar celdas a la cabecera con los títulos deseados (CodCat y Nombre)
            let codCatHeader = document.createElement("th");
            codCatHeader.textContent = "CodCat";
            cabecera.appendChild(codCatHeader);

            let nombreHeader = document.createElement("th");
            nombreHeader.textContent = "Nombre";
            cabecera.appendChild(nombreHeader);

            // Agregar la cabecera a la tabla
            tabla.appendChild(cabecera);
            
            for (let i = 0; i < categorias.length; i++) {
                let fila = document.createElement("tr");

                // Crear celdas para CodCat y Nombre en cada fila
                let codCatCell = document.createElement("td");
                codCatCell.textContent = categorias[i]["cod"]; // Supongo que "cod" es la propiedad del objeto
                fila.appendChild(codCatCell);

                let nombreCell = document.createElement("td");
                nombreCell.textContent = categorias[i]["nombre"]; // Supongo que "nombre" es la propiedad del objeto
                fila.appendChild(nombreCell);

                // Agregar la fila a la tabla
                tabla.appendChild(fila);
            }

            let seccion = document.getElementById("cambiar");
            seccion.innerHTML = "";
            seccion.appendChild(tabla);
        }
    };
    
    xhttp.open("GET", "datos_categoria_json.php", true);
    xhttp.send();
    return false;
}

function calcular() {
    let primerNumero = document.getElementById("1").value;
    let segundoNumero = document.getElementById("2").value;
    let operacion = document.getElementById("op").value;
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("resultado").innerHTML = this.responseText;
        }
    };

    xhttp.open("POST", "calculadora.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("primerNumero=" + primerNumero + "&segundoNumero=" + segundoNumero + "&operacion=" + operacion);
    return false;
}