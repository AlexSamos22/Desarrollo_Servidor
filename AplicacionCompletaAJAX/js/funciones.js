function login(){		
	var xhttp = new XMLHttpRequest();				
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			//alert(this.responseText);
			if(this.responseText==="FALSE"){
				alert("Revise usuario y contraseña");
			}else{
				document.getElementById("principal").style.display= "block";
				document.getElementById("login").style.display= "none";
				/*ponemos el usuario devuelto en el hueco correspondiente*/				
				document.getElementById("cab_usuario").innerHTML = "Usuario: " + usuario;			
			}
		}
	}
	var usuario = document.getElementById("correo").value;
	var clave = document.getElementById("clave").value;	
	var params = "usuario="+usuario+"&clave="+clave;
	xhttp.open("POST", "login.php", true);		
	// envío con  POT requiere cabecera y cadena de parámetros
	xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhttp.send(params);				
	return false;
}	

function cerrarSesion(){
	var xhttp = new XMLHttpRequest();		
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		document.getElementById("principal").style.display= "none";
		document.getElementById("login").style.display= "block";
		document.getElementById("contenido").innerHTML = "";
		alert("Sesion cerrada con éxito");									
	}};
	xhttp.open("GET", "cerrar_sesion.php", true);
	xhttp.send();		
return false;
}

function registro() {
	document.getElementById("principal").style.display= "none";
	document.getElementById("login").style.display= "none";
	document.getElementById("contenido").innerHTML = "";
	document.getElementById("registro").style.display="block";
}

function registrarse() {
	let correo = document.getElementById("correo_registro").value;
	let nombre = document.getElementById("nombre").value;
	let apellidos = document.getElementById("apellidos").value;
	let cont = document.getElementById("cont").value;
	let xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			let respuesta = this.responseText;

			if (respuesta == "TRUE") {
				alert("Cuenta creada con exito");
			}else{
				alert("Cuenta no creada");
			}
			document.getElementById("login").style.display= "block";
			document.getElementById("principal").style.display= "none";
		}
	};
	xhttp.open("POST", "registro.php", true);
	xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhttp.send("correo="+correo+"&nombre="+nombre+"&apellidos="+apellidos+"&cont="+cont);
	return false;
}

function cargarCategorias() {
	let xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			let cats =  JSON.parse(this.responseText);			
			let lista = document.createElement("ul");			
			for(var i = 0; i < cats.length; i++){
				let elem = document.createElement("li");
				vinculo = crearVinculoCategorias(cats[i].nombre, cats[i].cod);				
                elem.appendChild(vinculo);										
				lista.appendChild(elem);
			}
			let contenido = document.getElementById("contenido");
			contenido.innerHTML = "";	
			let titulo = document.getElementById("titulo");
			titulo.innerHTML ="Categorías";
			contenido.appendChild(lista);
		}
	};
	xhttp.open("GET", "categorias.php", true);
	xhttp.send();
	return false;
}

function crearVinculoCategorias(nom, cod){
	var vinculo = document.createElement("a");
	var ruta = "productosCat.php?categoria=" +cod;
	vinculo.href = ruta;
	vinculo.innerHTML = nom;
	vinculo.onclick = function(){return cargarProductos(this);}
	return vinculo;
}

function cargarProductos(destino){
	var xhttp = new XMLHttpRequest();	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {			
			var prod = document.getElementById("contenido");
			var titulo = document.getElementById("titulo");
			titulo.innerHTML ="Productos";
			try{
				var filas =  JSON.parse(this.responseText);	
				var tabla = crearTablaProductos(filas);				
				prod.innerHTML = "";
				prod.appendChild(tabla);												
			}catch(e){
				var mensaje = document.createElement("p");
				mensaje.innerHTML = "Categoría sin productos";
				prod.innerHTML = "";
				prod.appendChild(mensaje);
			}					
		}
	};	
	xhttp.open("GET", destino, true);
	xhttp.send();
	return false;
}

function crear_fila(campos, tipo){
	var fila = document.createElement("tr");
	for(var i = 0; i < campos.length; i++){
		var celda = document.createElement(tipo);
		celda.innerHTML = campos[i];
		fila.appendChild(celda);
	}
	return fila;
	
}
function crearFormulario(texto, cod, stock, funcion){
	var formu = document.createElement("form");
	var unidades = document.createElement("input");
	unidades.value = 1;
	unidades.type = "number";
	unidades.name = "unidades";
	unidades.min = 1;
	unidades.max = stock;
	var codigo = document.createElement("input");
	codigo.value = cod;
	codigo.type = "hidden";
	codigo.name = "cod";
	var bsubmit = document.createElement("input");
	bsubmit.type = "submit";
	bsubmit.value = texto;
	formu.onsubmit = function(){return funcion(this);}
	formu.appendChild(unidades);
	formu.appendChild(codigo);
	formu.appendChild(bsubmit);
	return formu;
}
function crearTablaProductos(productos){
	var tabla = document.createElement("table");
	var cabecera = 	crear_fila(["Código", "Nombre", "Stock", "Precio"], "th");
	tabla.appendChild(cabecera);
	for(var i = 0; i < productos.length; i++){
		/*formulario*/
		formu = crearFormulario( "Añadir", productos[i]['ID_Producto'], productos[i]['Stock'],anadirProductos);		
		fila = crear_fila([productos[i]['ID_Producto'], productos[i]['Nombre'], productos[i]['Stock'],productos[i]['Precio']], "td");
		celda_form = document.createElement("td");
		celda_form.appendChild(formu);
		fila.appendChild(celda_form);		
		tabla.appendChild(fila);		
	}	
	return tabla;		
}

function anadirProductos(formulario){
	var xhttp = new XMLHttpRequest();		
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			alert("Producto añadido con éxito");
			cargarCarrito();						
	}};
	var params = "cod="+formulario.elements['cod'].value+"&unidades="+formulario.elements['unidades'].value;
	xhttp.open("POST", "add_carrito.php", true);	
	xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhttp.send(params);	
	return false;
}

function cargarCarrito(){
	var xhttp = new XMLHttpRequest();		
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var contenido = document.getElementById("contenido");
			contenido.innerHTML = "";
			var titulo = document.getElementById("titulo");
			titulo.innerHTML ="Carrito de la compra";
			try{
				var filas =  JSON.parse(this.responseText);	
				tabla = crearTablaCarrito(filas);				
				contenido.appendChild(tabla);		
				/*ahora el vínculo de procesar pedio*/
				var procesar = document.createElement("a");
				procesar.href ="#";
				procesar.innerHTML= "Realizar pedido";
				procesar.onclick = function (){return procesarPedido();};
				contenido.appendChild(procesar);
			}catch(e){
				var mensaje = document.createElement("p");
				mensaje.innerHTML = "Todavía no tiene productos";
				contenido.appendChild(mensaje);
			}			
						
	}};
	xhttp.open("GET", "carrito.php", true);
	xhttp.send();
	return false;
}

function crearTablaCarrito(productos){
	var tabla = document.createElement("table");
	var cabecera = 	crear_fila(["Código", "Nombre", "Unidades", "Eliminar"], "th");
	tabla.appendChild(cabecera);
	for(var i = 0; i < productos.length; i++){
		/*formulario*/
		formu = crearFormulario("Eliminar", productos[i]['ID_Producto'], productos[i]['unidades'], eliminarProductos);		
		fila = crear_fila([productos[i]['ID_Producto'], productos[i]['nombre'],productos[i]['unidades']], "td");
		celda_form = document.createElement("td");
		celda_form.appendChild(formu);
		fila.appendChild(celda_form);		
		tabla.appendChild(fila);		
	}						
	return tabla;
}

function eliminarProductos(formulario){
	var xhttp = new XMLHttpRequest();		
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			alert("Producto eliminado con éxito");
			cargarCarrito();						
		}};
	var params = "cod="+formulario.elements['cod'].value+"&unidades="+formulario.elements['unidades'].value;
	xhttp.open("POST", "eliminar_prod_carrito.php", true);	
	//Send the proper header information along with the request
	xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhttp.send(params);	
	return false;
}

function crearTablaPedido(productos){
	var tabla = document.createElement("table");
	var cabecera = 	crear_fila(["Código", "Nombre", "Unidades"], "th");
	tabla.appendChild(cabecera);
	for(var i = 0; i < productos.length; i++){
		fila = crear_fila([productos[i]['ID_Producto'], productos[i]['nombre'], productos[i]['unidades']], "td");
		celda_form = document.createElement("td");
		fila.appendChild(celda_form);		
		tabla.appendChild(fila);		
	}						
	return tabla;
}

function procesarPedido(){
	var xhttp = new XMLHttpRequest();		
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var contenido = document.getElementById("contenido");
			contenido.innerHTML = "";
			var titulo = document.getElementById("titulo");
			titulo.innerHTML ="Estado del pedido";
			if(this.responseText.length>0){
				contenido.innerHTML = "Pedido realizado";
				var filas =  JSON.parse(this.responseText);	
				tabla = crearTablaPedido(filas);				
				contenido.appendChild(tabla);
			}else{
				contenido.innerHTML = "Error al procesar el pedido";
			}						
	}};
	xhttp.open("GET", "procesar_pedido.php", true);
	xhttp.send();
	return false;
}


function inicioClientes() {
	let xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			let cats =  JSON.parse(this.responseText);

			let categorias = document.createElement("button");
			categorias.style="padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_cat = document.createElement("a");
			link_cat.textContent = cats[0];
			link_cat.setAttribute("onclick", "return cargarCategorias()");
			categorias.appendChild(link_cat);

			let historal_pedidos = document.createElement("button");
			historal_pedidos.style="padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_pedidos = document.createElement("a");
			link_pedidos.textContent = cats[1];
			link_pedidos.setAttribute("onclick", "return cargarHistorialPedidos()");
			historal_pedidos.appendChild(link_pedidos);

			let contenido = document.getElementById("contenido");
			contenido.innerHTML = "";	
			contenido.appendChild(categorias);
			contenido.appendChild(historal_pedidos);
			let titulo = document.getElementById("titulo");
			titulo.innerHTML = "Inicio Tienda";
		}
	};
	xhttp.open("GET", "inicioClientes.php", true);
	xhttp.send();
	return false;
}

function inicioAdmin() {
	let xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			let cats =  JSON.parse(this.responseText);

			let stock = document.createElement("button");
			stock.style="padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_stock = document.createElement("a");
			link_stock.textContent = cats[0];
			link_stock.setAttribute("onclick", "return cargarCategorias_add_stock()");
			stock.appendChild(link_stock);

			let mod_usu = document.createElement("button");
			mod_usu.style="padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_mod_usu = document.createElement("a");
			link_mod_usu.textContent = cats[1];
			link_mod_usu.setAttribute("onclick", "return mostrar_modUsuarios()");
			mod_usu.appendChild(link_mod_usu);

			let add_prod = document.createElement("button");
			add_prod.style="padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_add_prod = document.createElement("a");
			link_add_prod.textContent = cats[2];
			link_add_prod.setAttribute("onclick", "return cargarHistorialPedidos()");
			add_prod.appendChild(link_add_prod);

			let del_prod = document.createElement("button");
			del_prod.style="padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_del_prod = document.createElement("a");
			link_del_prod.textContent = cats[3];
			link_del_prod.setAttribute("onclick", "return cargarHistorialPedidos()");
			del_prod.appendChild(link_del_prod);

			let add_cat = document.createElement("button");
			add_cat.style="padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_add_cat = document.createElement("a");
			link_add_cat.textContent = cats[4];
			link_add_cat.setAttribute("onclick", "return cargarHistorialPedidos()");
			add_cat.appendChild(link_add_cat);
			
			let otra_seccion = document.getElementById("opcion_mod");
			otra_seccion.style.display="none";
			let contenido = document.getElementById("contenido");
			contenido.style.display="block";
			contenido.innerHTML = "";	
			contenido.appendChild(stock);
			contenido.appendChild(mod_usu);
			contenido.appendChild(add_prod);
			contenido.appendChild(del_prod);
			contenido.appendChild(add_cat);
			let titulo = document.getElementById("titulo");
			titulo.innerHTML = "Panel de control";
		}
	};
	xhttp.open("GET", "inicioAdmin.php", true);
	xhttp.send();
	return false;
}

function cargarHistorialPedidos(){
	let xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				let pedidos =  JSON.parse(this.responseText);
				let tabla = document.createElement("table");
				tabla.style = "border-collapse: collapse; width: 100%; text-align: center";
				let cabecera = document.createElement("tr");

				let cab_id = document.createElement("th");
				cab_id.innerHTML= "ID del cliente";
				cabecera.appendChild(cab_id);

				let cab_id_pedido = document.createElement("th");
				cab_id_pedido.innerHTML= "ID del pedido";
				cabecera.appendChild(cab_id_pedido);

				let cab_prod_comprados = document.createElement("th");
				cab_prod_comprados.innerHTML= "Productos comprados";
				cabecera.appendChild(cab_prod_comprados);

				let cab_u_compradas = document.createElement("th");
				cab_u_compradas.innerHTML= "Unidades compradas";
				cabecera.appendChild(cab_u_compradas);

				tabla.appendChild(cabecera);

				for (let i = 0; i < pedidos.length; i++) {
					let item = document.createElement("tr");
					
					let cuerpo_id = document.createElement("td");
					cuerpo_id.innerHTML= pedidos[i]["ID_Cliente"];
					item.appendChild(cuerpo_id);

					let cuerpo_id_pedido = document.createElement("td");
					cuerpo_id_pedido.innerHTML= pedidos[i]["ID_Pedido"];
					item.appendChild(cuerpo_id_pedido);

					let cuerpo_nombre_pedido = document.createElement("td");
					cuerpo_nombre_pedido.innerHTML= pedidos[i]["Nombre"];
					item.appendChild(cuerpo_nombre_pedido);

					let cuerpo_unidades = document.createElement("td");
					cuerpo_unidades.innerHTML= pedidos[i]["Unidades"];
					item.appendChild(cuerpo_unidades);

					tabla.appendChild(item);
				}	
				
				let contenido = document.getElementById("contenido");
				contenido.innerHTML = "";	
				let titulo = document.getElementById("titulo");
				titulo.innerHTML ="Historial de pedidos";
				contenido.appendChild(tabla);
			}
		};
	xhttp.open("GET", "historialPedidos.php", true);
	xhttp.send();
	return false;
};
function cargarCategorias_add_stock() {
	let xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			let cats =  JSON.parse(this.responseText);			
			let lista = document.createElement("ul");			
			for(var i = 0; i < cats.length; i++){
				let elem = document.createElement("li");
				vinculo = crearVinculoCategorias_add_stock(cats[i].nombre, cats[i].cod);				
                elem.appendChild(vinculo);										
				lista.appendChild(elem);
			}
			let contenido = document.getElementById("contenido");
			contenido.innerHTML = "";	
			let titulo = document.getElementById("titulo");
			titulo.innerHTML ="Categorías";
			contenido.appendChild(lista);
		}
	};
	xhttp.open("GET", "categorias.php", true);
	xhttp.send();
	return false;
}

function crearVinculoCategorias_add_stock(nom, cod){
	var vinculo = document.createElement("a");
	var ruta = "productosCat.php?categoria=" +cod;
	vinculo.href = ruta;
	vinculo.innerHTML = nom;
	vinculo.onclick = function(){return cargarProductos_add_stock(this);}
	return vinculo;
}

function add_Stock(formulario) {
	var xhttp = new XMLHttpRequest();		
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "TRUE") {
				alert("Stock añadido con éxito");
				inicioAdmin();
			}else{
				alert("Hubo un error");
				inicioAdmin();
			}						
	}};
	var params = "cod="+formulario.elements['cod'].value+"&unidades="+formulario.elements['unidades'].value;
	xhttp.open("POST", "añadirStock.php", true);	
	xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhttp.send(params);	
	return false;
	
}

function cargarProductos_add_stock(destino){
	var xhttp = new XMLHttpRequest();	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {			
			var prod = document.getElementById("contenido");
			var titulo = document.getElementById("titulo");
			titulo.innerHTML ="Productos";
			try{
				var filas =  JSON.parse(this.responseText);	
				var tabla = crearTablaProductos_add_stock(filas);				
				prod.innerHTML = "";
				prod.appendChild(tabla);												
			}catch(e){
				var mensaje = document.createElement("p");
				mensaje.innerHTML = "Categoría sin productos";
				prod.innerHTML = "";
				prod.appendChild(mensaje);
			}					
		}
	};	
	xhttp.open("GET", destino, true);
	xhttp.send();
	return false;
}

function crear_fila(campos, tipo){
	var fila = document.createElement("tr");
	for(var i = 0; i < campos.length; i++){
		var celda = document.createElement(tipo);
		celda.innerHTML = campos[i];
		fila.appendChild(celda);
	}
	return fila;
	
}
function crearFormulario_add_stock(texto, cod, funcion){
	var formu = document.createElement("form");
	var unidades = document.createElement("input");
	unidades.value = 1;
	unidades.type = "number";
	unidades.name = "unidades";
	unidades.min = 1;
	var codigo = document.createElement("input");
	codigo.value = cod;
	codigo.type = "hidden";
	codigo.name = "cod";
	var bsubmit = document.createElement("input");
	bsubmit.type = "submit";
	bsubmit.value = texto;
	formu.onsubmit = function(){return funcion(this);}
	formu.appendChild(unidades);
	formu.appendChild(codigo);
	formu.appendChild(bsubmit);
	return formu;
}
function crearTablaProductos_add_stock(productos){
	var tabla = document.createElement("table");
	var cabecera = 	crear_fila(["Código", "Nombre", "Stock Actual"], "th");
	tabla.appendChild(cabecera);
	for(var i = 0; i < productos.length; i++){
		/*formulario*/
		formu = crearFormulario_add_stock( "Añadir", productos[i]['ID_Producto'], productos[i]['Stock'],add_Stock);		
		fila = crear_fila([productos[i]['ID_Producto'], productos[i]['Nombre'], productos[i]['Stock']], "td");
		celda_form = document.createElement("td");
		celda_form.appendChild(formu);
		fila.appendChild(celda_form);		
		tabla.appendChild(fila);		
	}	
	return tabla;		
}

function mostrar_modUsuarios(){
	document.getElementById("principal").style.display= "block";
	document.getElementById("login").style.display= "none";
	document.getElementById("contenido").style.display="none";
	document.getElementById("opcion_mod").style.display="block";
}

function modUsuarios(){
	let opcion = document.getElementById("opcion").value;
	let form = document.createElement("form");
	let seccion = document.getElementById("opcion_mod");
	if (opcion == "admin") {
		let select = document.createElement("select");
		select.id="opcion2";

		let label = document.createElement("label");
		label.htmlFor = "opcion2";
		label.innerHTML = "Elija que hacer con el admin";
		form.appendChild(label);

		let opcion1_admin = document.createElement("option");
		opcion1_admin.value="Añadir";
		opcion1_admin.innerHTML="Añadir"

		let opcion2_admin = document.createElement("option");
		opcion2_admin.value="Eliminar";
		opcion2_admin.innerHTML="Eliminar"

		let opcion3_admin = document.createElement("option");
		opcion3_admin.value="Modificar";
		opcion3_admin.innerHTML = "Modificar"

		select.appendChild(opcion1_admin);
		select.appendChild(opcion2_admin);
		select.appendChild(opcion3_admin);

		let submit = document.createElement("input");
		submit.type= "submit"
		submit.value="Enviar";
		
		form.appendChild(select);
		form.appendChild(submit);

		let titulo = document.createElement("h1");
		titulo.innerHTML = "Elija una opcion para los Usuarios";
		seccion.innerHTML = "";
		seccion.appendChild(titulo);
		seccion.appendChild(form);
	}else{
		let select = document.createElement("select");
		select.id="opcion2";

		let label = document.createElement("label");
		label.htmlFor = "opcion2";
		label.innerHTML = "Elija que hacer con el usuario";
		form.appendChild(label);

		let opcion1_usu = document.createElement("option");
		opcion1_usu.value="Modificar";
		opcion1_usu.innerHTML = "Modificar";

		let opcion2_usu = document.createElement("option");
		opcion2_usu.value="Eliminar";
		opcion2_usu.innerHTML = "Eliminar"

		select.appendChild(opcion1_usu);
		select.appendChild(opcion2_usu);

		let submit = document.createElement("input");
		submit.type= "submit"
		submit.value="Enviar";
		
		form.appendChild(select);
		form.appendChild(submit);

		let titulo = document.createElement("h1");
		titulo.innerHTML = "Elija una opcion para los Usuarios";
		seccion.innerHTML = "";
		seccion.appendChild(titulo);
		seccion.appendChild(form);
	}

	return false;
}