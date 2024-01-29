function hora() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            let seccion = document.getElementById("cambiar");
            seccion.innerHTML = "La hora actual es: " + this.responseText;
        }
    };
    xhttp.open("GET", "hora_servidor.php", true);
    xhttp.send();
    return false;
}

function listaCategorias() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            let seccion = document.getElementById("cambiar");
            let categorias = JSON.parse(this.responseText);
            let lista = document.createElement("ul");
            for (let i = 0; i < categorias.length; i++) {
                let item = document.createElement("li");
                item.textContent = categorias[i]["nombre"];
                lista.appendChild(item);
            }
            seccion.appendChild(lista);
        }
    };
    xhttp.open("GET", "categorias.php", true);
    xhttp.send();
    return false;
}

function tablaProductos() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            let seccion = document.getElementById("cambiar");
            let productos = JSON.parse(this.responseText);
            let tabla = document.createElement("table");
            let cabecera = document.createElement("tr");

            let cod_cabecera = document.createElement("th");
            cod_cabecera.innerHTML = "CodProd";
            cabecera.appendChild(cod_cabecera);

            let nombre_cabecera = document.createElement("th");
            nombre_cabecera.innerHTML = "Nombre";
            cabecera.appendChild(nombre_cabecera);

            let desc_cabecera = document.createElement("th");
            desc_cabecera.innerHTML = "Descripcion";
            cabecera.appendChild(desc_cabecera);

            let peso_cabecera = document.createElement("th");
            peso_cabecera.innerHTML = "Peso";
            cabecera.appendChild(peso_cabecera);

            let stock_cabecera = document.createElement("th");
            stock_cabecera.innerHTML = "Codigo";
            cabecera.appendChild(stock_cabecera);

            let cat_cabecera = document.createElement("th");
            cat_cabecera.innerHTML = "Categoria";
            cabecera.appendChild(cat_cabecera);

            tabla.appendChild(cabecera);

            for (let i = 0; i < productos.length; i++) {
                let item = document.createElement("tr");

                let cuerpo_cod = document.createElement("td");
                cuerpo_cod.innerHTML = productos[i]["CodProd"];
                item.appendChild(cuerpo_cod);

                let cuerpo_nombre =  document.createElement("td");
                cuerpo_nombre.innerHTML = productos[i]["nombre"];
                item.appendChild(cuerpo_nombre);

                let cuerpo_desc =  document.createElement("td");
                cuerpo_desc.innerHTML = productos[i]["descripcion"];
                item.appendChild(cuerpo_desc);

                let cuerpo_peso =  document.createElement("td");
                cuerpo_peso.innerHTML = productos[i]["peso"];
                item.appendChild(cuerpo_peso);

                let cuerpo_stock =  document.createElement("td");
                cuerpo_stock.innerHTML = productos[i]["stock"];
                item.appendChild(cuerpo_stock);

                let cuerpo_cat =  document.createElement("td");
                cuerpo_cat.innerHTML = productos[i]["categoria"];
                item.appendChild(cuerpo_cat);

                tabla.appendChild(item);

            }
            seccion.appendChild(tabla);
        }
    };
    xhttp.open("GET", "categorias_bd.php", true);
    xhttp.send();
    return false;
}

function formulario() {
    let seccion = document.getElementById("cambiar");
    let form = document.createElement("form");

    let label = document.createElement("label");
    label.htmlFor="1";
    label.innerHTML = "Nombre";
    form.appendChild(label);

    let input = document.createElement("input");
    input.type="text";
    input.id="1";
    input.placeholder="nombre";
    form.appendChild(input);

    let boton = document.createElement("button");
    boton.type="submit";
    boton.innerHTML="enviar";
    form.appendChild(boton);

    seccion.appendChild(form);
}

function conversor() {
    let numero = document.getElementById("1").value;
    let unidad = document.getElementById("u").value;
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            let resultado = this.responseText;
            document.getElementById("cambiar").innerHTML = "El resultado de la conversion es: " + resultado;
        }
    };
    xhttp.open("POST", "conversor.php", true);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send("numero="+numero+"&unidad="+unidad);
    return false;
}

function primos() {
    let contador = 0;
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            let resultado = JSON.parse(this.responseText);
            let primos = "";
            for (let i = 0; i < resultado.length; i++) {
                for (let j = 1; j <= 10; j++) {
                    if (resultado[i] % j == 0) {
                        contador ++;
                    }
                }
                if(contador == 2){
                    primos += resultado[i] + " ";
                }
                contador = 0;
            }
            document.getElementById("cambiar").innerHTML = "Los numeros primos son: " + primos;
        }
    };
    xhttp.open("GET", "comprobar_numeros.php", true);
    xhttp.send();
    return false;
}

function contarApariciones() {
    let contador = 0;
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            let cadena = JSON.parse(this.responseText);
            let frase = cadena[0].split(" ");
            let palabra = cadena[1];

            for (let i = 0; i < frase.length; i++) {
                if (frase[i].includes(palabra)) {
                    contador ++;
                }
            }
            document.getElementById("cambiar").innerHTML = `La palabra ${palabra} aparece ${contador} veces en la frase ${cadena[0]}`;
        }
    };
    xhttp.open("GET", "palabra.php", true);
    xhttp.send();
    return false;
}

function contarApariciones2() {
    let frase = document.getElementById("1").value;
    let palabra = document.getElementById("2").value;
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            let respuesta = this.responseText;
            document.getElementById("cambiar").innerHTML = `La palabra aparece ${respuesta} veces`;
        }
    };
    xhttp.open("POST", "palabra_en_PHP.php", true);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send("frase="+frase+"&palabra="+palabra);
    return false;
}

function restaurantesLista() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            let seccion = document.getElementById("cambiar");
            let restaurantes = JSON.parse(this.responseText);
            let lista = document.createElement("ul");
            for (let i = 0; i < restaurantes.length; i++) {
                let item = document.createElement("li");
                let link = document.createElement("a");
                link.textContent = restaurantes[i]["CodRes"];
                item.appendChild(link);
                lista.appendChild(item);
            }

            seccion.appendChild(lista);
        }
    };
    xhttp.open("GET", "listar.php", true);
    xhttp.send();
    return false;
}

function restaurantesTabla() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            let seccion = document.getElementById("cambiar");
            let restaurantes = JSON.parse(this.responseText);
            let tabla = document.createElement("table");
            let cabecera = document.createElement("tr");

            let cod_cabecera = document.createElement("th");
            cod_cabecera.innerHTML = "CodRes";
            cabecera.appendChild(cod_cabecera);

            let ciudad_cabecera = document.createElement("th");
            ciudad_cabecera.innerHTML = "Ciudad";
            cabecera.appendChild(ciudad_cabecera);

            let dirc_cabecera = document.createElement("th");
            dirc_cabecera.innerHTML = "Direccion";
            cabecera.appendChild(dirc_cabecera);

            tabla.appendChild(cabecera);
            
            for (let i = 0; i < restaurantes.length; i++) {
                let item = document.createElement("tr");

                let c_cod = document.createElement("td");
                c_cod.innerHTML = restaurantes[i]["CodRes"];
                item.appendChild(c_cod);

                let c_ciudad = document.createElement("td");
                c_ciudad.innerHTML = restaurantes[i]["ciudad"];
                item.appendChild(c_ciudad);

                let c_dir = document.createElement("td");
                c_dir.innerHTML = restaurantes[i]["direccion"];
                item.appendChild(c_dir);

                tabla.appendChild(item);

            }

            seccion.appendChild(tabla);
        }
    };
    xhttp.open("GET", "listar.php", true);
    xhttp.send();
    return false;
}