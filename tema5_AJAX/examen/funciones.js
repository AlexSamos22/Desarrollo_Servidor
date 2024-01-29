function info() {
    let nombre = document.getElementById("nombre").value;
    let apellidos = document.getElementById("apellidos").value;
    let edad = document.getElementById("edad").value;
    let saludo = `Hola ${nombre} ${apellidos} tienes ${edad} años`;

    let seccion = document.getElementById("cambiar");
    seccion.textContent = saludo;
    return false;
}

function calcular() {
    let primerNumero = document.getElementById("1").value;
    let segundoNumero = document.getElementById("2").value;
    let operacion = document.getElementById("op").value;
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let mensaje = `El resultado de ${operacion} entre ${primerNumero} y ${segundoNumero} es: `;
            document.getElementById("resultado").innerHTML = mensaje + this.responseText;
        }
    };

    xhttp.open("POST", "Ejer2.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("primerNumero=" + primerNumero + "&segundoNumero=" + segundoNumero + "&operacion=" + operacion);
    return false;
}

function departamentos() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            let seccion = document.getElementById("informacion");
            let departamentos = JSON.parse(this.responseText);
            let tabla = document.createElement("table");
            let cabecera = document.createElement("tr");

            let cod_cabecera = document.createElement("th");
            cod_cabecera.innerHTML = "CodDep";
            cabecera.appendChild(cod_cabecera);

            let nombre_cabecera = document.createElement("th");
            nombre_cabecera.innerHTML = "Nombre";
            cabecera.appendChild(nombre_cabecera);

            let jefe_cabecera = document.createElement("th");
            jefe_cabecera.innerHTML = "Jefe";
            cabecera.appendChild(jefe_cabecera);

            let pre_cabecera = document.createElement("th");
            pre_cabecera.innerHTML = "Presupuesto";
            cabecera.appendChild(pre_cabecera);

            let ciudad_cabecera = document.createElement("th");
            ciudad_cabecera.innerHTML = "Ciudad";
            cabecera.appendChild(ciudad_cabecera);

            tabla.appendChild(cabecera);

            for (let i = 0; i < departamentos.length; i++) {
                let item = document.createElement("tr");

                let cuerpo_cod = document.createElement("td");
                cuerpo_cod.innerHTML = departamentos[i]["CodDept"];
                item.appendChild(cuerpo_cod);

                let cuerpo_nombre =  document.createElement("td");
                cuerpo_nombre.innerHTML = departamentos[i]["nombre"];
                item.appendChild(cuerpo_nombre);

                let cuerpo_jefe =  document.createElement("td");
                cuerpo_jefe.innerHTML = departamentos[i]["jefe"];
                item.appendChild(cuerpo_jefe);

                let cuerpo_pre =  document.createElement("td");
                cuerpo_pre.innerHTML = departamentos[i]["presupuesto"];
                item.appendChild(cuerpo_pre);

                let cuerpo_ciudad =  document.createElement("td");
                cuerpo_ciudad.innerHTML = departamentos[i]["ciudad"];
                item.appendChild(cuerpo_ciudad);

                tabla.appendChild(item);

            }
            seccion.innerHTML= "";
            seccion.appendChild(tabla);
        }
    };
    xhttp.open("GET", "departamentos.php", true);
    xhttp.send();
    return false;
}

function empleados() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            let seccion = document.getElementById("informacion");
            let empleado = JSON.parse(this.responseText);
            let tabla = document.createElement("table");
            let cabecera = document.createElement("tr");

            let cod_cabecera = document.createElement("th");
            cod_cabecera.innerHTML = "CodEmple";
            cabecera.appendChild(cod_cabecera);

            let nombre_cabecera = document.createElement("th");
            nombre_cabecera.innerHTML = "Nombre";
            cabecera.appendChild(nombre_cabecera);

            let a1_cabecera = document.createElement("th");
            a1_cabecera.innerHTML = "Apellido 1";
            cabecera.appendChild(a1_cabecera);

            let a2_cabecera = document.createElement("th");
            a2_cabecera.innerHTML = "Apellido 2";
            cabecera.appendChild(a2_cabecera);

            let departamento_cabecera = document.createElement("th");
            departamento_cabecera.innerHTML = "Departamento";
            cabecera.appendChild(departamento_cabecera);

            tabla.appendChild(cabecera);

            for (let i = 0; i < empleado.length; i++) {
                let item = document.createElement("tr");

                let cuerpo_cod = document.createElement("td");
                cuerpo_cod.innerHTML = empleado[i]["CodEmple"];
                item.appendChild(cuerpo_cod);

                let cuerpo_nombre =  document.createElement("td");
                cuerpo_nombre.innerHTML = empleado[i]["nombre"];
                item.appendChild(cuerpo_nombre);

                let cuerpo_a1 =  document.createElement("td");
                cuerpo_a1.innerHTML = empleado[i]["apellido1"];
                item.appendChild(cuerpo_a1);

                let cuerpo_a2 =  document.createElement("td");
                cuerpo_a2.innerHTML = empleado[i]["apellido2"];
                item.appendChild(cuerpo_a2);

                let cuerpo_departamento =  document.createElement("td");
                cuerpo_departamento.innerHTML = empleado[i]["departamento"];
                item.appendChild(cuerpo_departamento);

                tabla.appendChild(item);

            }
            seccion.innerHTML= "";
            seccion.appendChild(tabla);
        }
    };
    xhttp.open("GET", "empleados.php", true);
    xhttp.send();
    return false;
}

function usuarios() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            let seccion = document.getElementById("informacion");
            let usuario = JSON.parse(this.responseText);
            let tabla = document.createElement("table");
            let cabecera = document.createElement("tr");

            let cod_cabecera = document.createElement("th");
            cod_cabecera.innerHTML = "Codigo";
            cabecera.appendChild(cod_cabecera);

            let nombre_cabecera = document.createElement("th");
            nombre_cabecera.innerHTML = "Nombre";
            cabecera.appendChild(nombre_cabecera);

            let clave_cabecera = document.createElement("th");
            clave_cabecera.innerHTML = "Clave";
            cabecera.appendChild(clave_cabecera);

            let rol_cabecera = document.createElement("th");
            rol_cabecera.innerHTML = "Rol";
            cabecera.appendChild(rol_cabecera);

            tabla.appendChild(cabecera);

            for (let i = 0; i < usuario.length; i++) {
                let item = document.createElement("tr");

                let cuerpo_cod = document.createElement("td");
                cuerpo_cod.innerHTML = usuario[i]["Codigo"];
                item.appendChild(cuerpo_cod);

                let cuerpo_nombre =  document.createElement("td");
                cuerpo_nombre.innerHTML = usuario[i]["nombre"];
                item.appendChild(cuerpo_nombre);

                let cuerpo_clave =  document.createElement("td");
                cuerpo_clave.innerHTML = usuario[i]["clave"];
                item.appendChild(cuerpo_clave);

                let cuerpo_rol =  document.createElement("td");
                cuerpo_rol.innerHTML = usuario[i]["rol"];
                item.appendChild(cuerpo_rol);

                tabla.appendChild(item);

            }
            seccion.innerHTML= "";
            seccion.appendChild(tabla);
        }
    };
    xhttp.open("GET", "usuarios.php", true);
    xhttp.send();
    return false;
}