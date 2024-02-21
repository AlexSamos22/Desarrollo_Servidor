function login() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			//alert(this.responseText);
			if (this.responseText === "FALSE") {
				alert("Revise usuario y contraseña");
			} else {
				document.getElementById("principal").style.display = "block";
				document.getElementById("login").style.display = "none";
				/*ponemos el usuario devuelto en el hueco correspondiente*/
				document.getElementById("cab_usuario").innerHTML = "Usuario: " + usuario;
			}
		}
	}
	var usuario = document.getElementById("correo").value;
	var clave = document.getElementById("clave").value;
	var params = "usuario=" + usuario + "&clave=" + clave;
	xhttp.open("POST", "login.php", true);
	// envío con  POT requiere cabecera y cadena de parámetros
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(params);
	return false;
}

function cerrarSesion() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("principal").style.display = "none";
			document.getElementById("login").style.display = "block";
			document.getElementById("contenido").innerHTML = "";
			alert("Sesion cerrada con éxito");
		}
	};
	xhttp.open("GET", "cerrar_sesion.php", true);
	xhttp.send();
	return false;
}

function registro() {
	document.getElementById("principal").style.display = "none";
	document.getElementById("login").style.display = "none";
	document.getElementById("contenido").innerHTML = "";
	document.getElementById("registro").style.display = "block";
}

function registrarse() {
	let correo = document.getElementById("correo_registro").value;
	let nombre = document.getElementById("nombre").value;
	let apellidos = document.getElementById("apellidos").value;
	let cont = document.getElementById("cont").value;
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			let respuesta = this.responseText;

			if (respuesta == "TRUE") {
				alert("Cuenta creada con exito");
			} else {
				alert("Cuenta no creada");
			}
			document.getElementById("login").style.display = "block";
			document.getElementById("principal").style.display = "none";
		}
	};
	xhttp.open("POST", "registro.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("correo=" + correo + "&nombre=" + nombre + "&apellidos=" + apellidos + "&cont=" + cont);
	return false;
}

function cargarCategorias() {
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			let cats = JSON.parse(this.responseText);
			let lista = document.createElement("ul");
			for (var i = 0; i < cats.length; i++) {
				let elem = document.createElement("li");
				vinculo = crearVinculoCategorias(cats[i].nombre, cats[i].cod);
				elem.appendChild(vinculo);
				lista.appendChild(elem);
			}
			let contenido = document.getElementById("contenido");
			contenido.innerHTML = "";
			let titulo = document.getElementById("titulo");
			titulo.innerHTML = "Categorías";
			contenido.appendChild(lista);
		}
	};
	xhttp.open("GET", "categorias.php", true);
	xhttp.send();
	return false;
}

function crearVinculoCategorias(nom, cod) {
	var vinculo = document.createElement("a");
	var ruta = "productosCat.php?categoria=" + cod;
	vinculo.href = ruta;
	vinculo.innerHTML = nom;
	vinculo.onclick = function () { return cargarProductos(this); }
	return vinculo;
}

function cargarProductos(destino) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var prod = document.getElementById("contenido");
			var titulo = document.getElementById("titulo");
			titulo.innerHTML = "Productos";
			try {
				var filas = JSON.parse(this.responseText);
				var tabla = crearTablaProductos(filas);
				prod.innerHTML = "";
				prod.appendChild(tabla);
			} catch (e) {
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

function crear_fila(campos, tipo) {
	var fila = document.createElement("tr");
	for (var i = 0; i < campos.length; i++) {
		var celda = document.createElement(tipo);
		celda.innerHTML = campos[i];
		fila.appendChild(celda);
	}
	return fila;

}
function crearFormulario(texto, cod, stock, funcion) {
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
	formu.onsubmit = function () { return funcion(this); }
	formu.appendChild(unidades);
	formu.appendChild(codigo);
	formu.appendChild(bsubmit);
	return formu;
}
function crearTablaProductos(productos) {
	var tabla = document.createElement("table");
	var cabecera = crear_fila(["Código", "Nombre", "Stock", "Precio"], "th");
	tabla.appendChild(cabecera);
	for (var i = 0; i < productos.length; i++) {
		/*formulario*/
		formu = crearFormulario("Añadir", productos[i]['ID_Producto'], productos[i]['Stock'], anadirProductos);
		fila = crear_fila([productos[i]['ID_Producto'], productos[i]['Nombre'], productos[i]['Stock'], productos[i]['Precio']], "td");
		celda_form = document.createElement("td");
		celda_form.appendChild(formu);
		fila.appendChild(celda_form);
		tabla.appendChild(fila);
	}
	return tabla;
}

function anadirProductos(formulario) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			alert("Producto añadido con éxito");
			cargarCarrito();
		}
	};
	var params = "cod=" + formulario.elements['cod'].value + "&unidades=" + formulario.elements['unidades'].value;
	xhttp.open("POST", "add_carrito.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(params);
	return false;
}

function cargarCarrito() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var contenido = document.getElementById("contenido");
			contenido.innerHTML = "";
			var titulo = document.getElementById("titulo");
			titulo.innerHTML = "Carrito de la compra";
			try {
				var filas = JSON.parse(this.responseText);
				tabla = crearTablaCarrito(filas);
				contenido.appendChild(tabla);
				/*ahora el vínculo de procesar pedio*/
				var procesar = document.createElement("a");
				procesar.href = "#";
				procesar.innerHTML = "Realizar pedido";
				procesar.onclick = function () { return procesarPedido(); };
				contenido.appendChild(procesar);
			} catch (e) {
				var mensaje = document.createElement("p");
				mensaje.innerHTML = "Todavía no tiene productos";
				contenido.appendChild(mensaje);
			}

		}
	};
	xhttp.open("GET", "carrito.php", true);
	xhttp.send();
	return false;
}

function crearTablaCarrito(productos) {
	var tabla = document.createElement("table");
	var cabecera = crear_fila(["Código", "Nombre", "Unidades", "Eliminar"], "th");
	tabla.appendChild(cabecera);
	for (var i = 0; i < productos.length; i++) {
		/*formulario*/
		formu = crearFormulario("Eliminar", productos[i]['ID_Producto'], productos[i]['unidades'], eliminarProductos);
		fila = crear_fila([productos[i]['ID_Producto'], productos[i]['nombre'], productos[i]['unidades']], "td");
		celda_form = document.createElement("td");
		celda_form.appendChild(formu);
		fila.appendChild(celda_form);
		tabla.appendChild(fila);
	}
	return tabla;
}

function eliminarProductos(formulario) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			alert("Producto eliminado con éxito");
			cargarCarrito();
		}
	};
	var params = "cod=" + formulario.elements['cod'].value + "&unidades=" + formulario.elements['unidades'].value;
	xhttp.open("POST", "eliminar_prod_carrito.php", true);
	//Send the proper header information along with the request
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(params);
	return false;
}

function crearTablaPedido(productos) {
	var tabla = document.createElement("table");
	var cabecera = crear_fila(["Código", "Nombre", "Unidades"], "th");
	tabla.appendChild(cabecera);
	for (var i = 0; i < productos.length; i++) {
		fila = crear_fila([productos[i]['ID_Producto'], productos[i]['nombre'], productos[i]['unidades']], "td");
		celda_form = document.createElement("td");
		fila.appendChild(celda_form);
		tabla.appendChild(fila);
	}
	return tabla;
}

function procesarPedido() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var contenido = document.getElementById("contenido");
			contenido.innerHTML = "";
			var titulo = document.getElementById("titulo");
			titulo.innerHTML = "Estado del pedido";
			if (this.responseText.length > 0) {
				contenido.innerHTML = "Pedido realizado";
				var filas = JSON.parse(this.responseText);
				tabla = crearTablaPedido(filas);
				contenido.appendChild(tabla);
			} else {
				contenido.innerHTML = "Error al procesar el pedido";
			}
		}
	};
	xhttp.open("GET", "procesar_pedido.php", true);
	xhttp.send();
	return false;
}


function inicioClientes() {
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			let cats = JSON.parse(this.responseText);

			let categorias = document.createElement("button");
			categorias.style = "padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_cat = document.createElement("a");
			link_cat.textContent = cats[0];
			link_cat.setAttribute("onclick", "return cargarCategorias()");
			categorias.appendChild(link_cat);

			let historal_pedidos = document.createElement("button");
			historal_pedidos.style = "padding: 5px 10px; font-size: 14px; margin-right: 5px;";
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
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			let cats = JSON.parse(this.responseText);

			let stock = document.createElement("button");
			stock.style = "padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_stock = document.createElement("a");
			link_stock.textContent = cats[0];
			link_stock.setAttribute("onclick", "return add_stock()");
			stock.appendChild(link_stock);

			let mod_cliente = document.createElement("button");
			mod_cliente.style = "padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_mod_cliente = document.createElement("a");
			link_mod_cliente.textContent = cats[1];
			link_mod_cliente.setAttribute("onclick", "return mod_cliente()");
			mod_cliente.appendChild(link_mod_cliente);

			let del_cliente = document.createElement("button");
			del_cliente.style = "padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_del_cliente = document.createElement("a");
			link_del_cliente.textContent = cats[2];
			link_del_cliente.setAttribute("onclick", "return del_cliente()");
			del_cliente.appendChild(link_del_cliente);

			let add_admin = document.createElement("button");
			add_admin.style = "padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_add_admin = document.createElement("a");
			link_add_admin.textContent = cats[3];
			link_add_admin.setAttribute("onclick", "return add_admin()");
			add_admin.appendChild(link_add_admin);

			let mod_admin = document.createElement("button");
			mod_admin.style = "padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_mod_admin = document.createElement("a");
			link_mod_admin.textContent = cats[4];
			link_mod_admin.setAttribute("onclick", "return mod_admin()");
			mod_admin.appendChild(link_mod_admin);

			let del_admin = document.createElement("button");
			del_admin.style = "padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_del_admin = document.createElement("a");
			link_del_admin.textContent = cats[5];
			link_del_admin.setAttribute("onclick", "return del_admin()");
			del_admin.appendChild(link_del_admin);

			let add_prod = document.createElement("button");
			add_prod.style = "padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_add_prod = document.createElement("a");
			link_add_prod.textContent = cats[6];
			link_add_prod.setAttribute("onclick", "return add_producto()");
			add_prod.appendChild(link_add_prod);

			let del_prod = document.createElement("button");
			del_prod.style = "padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_del_prod = document.createElement("a");
			link_del_prod.textContent = cats[7];
			link_del_prod.setAttribute("onclick", "return del_producto()");
			del_prod.appendChild(link_del_prod);

			let add_cat = document.createElement("button");
			add_cat.style = "padding: 5px 10px; font-size: 14px; margin-right: 5px;";
			let link_add_cat = document.createElement("a");
			link_add_cat.textContent = cats[8];
			link_add_cat.setAttribute("onclick", "return add_cat()");
			add_cat.appendChild(link_add_cat);

			let contenido = document.getElementById("contenido");
			contenido.style.display = "block";
			contenido.innerHTML = "";
			contenido.appendChild(stock);
			contenido.appendChild(mod_cliente);
			contenido.appendChild(del_cliente);
			contenido.appendChild(add_admin);
			contenido.appendChild(mod_admin);
			contenido.appendChild(del_admin);
			contenido.appendChild(add_prod)
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

function cargarHistorialPedidos() {
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			let pedidos = JSON.parse(this.responseText);
			let tabla = document.createElement("table");
			tabla.style = "border-collapse: collapse; width: 100%; text-align: center";
			let cabecera = document.createElement("tr");

			let cab_id = document.createElement("th");
			cab_id.innerHTML = "ID del cliente";
			cabecera.appendChild(cab_id);

			let cab_id_pedido = document.createElement("th");
			cab_id_pedido.innerHTML = "ID del pedido";
			cabecera.appendChild(cab_id_pedido);

			let cab_prod_comprados = document.createElement("th");
			cab_prod_comprados.innerHTML = "Productos comprados";
			cabecera.appendChild(cab_prod_comprados);

			let cab_u_compradas = document.createElement("th");
			cab_u_compradas.innerHTML = "Unidades compradas";
			cabecera.appendChild(cab_u_compradas);

			tabla.appendChild(cabecera);

			for (let i = 0; i < pedidos.length; i++) {
				let item = document.createElement("tr");

				let cuerpo_id = document.createElement("td");
				cuerpo_id.innerHTML = pedidos[i]["ID_Cliente"];
				item.appendChild(cuerpo_id);

				let cuerpo_id_pedido = document.createElement("td");
				cuerpo_id_pedido.innerHTML = pedidos[i]["ID_Pedido"];
				item.appendChild(cuerpo_id_pedido);

				let cuerpo_nombre_pedido = document.createElement("td");
				cuerpo_nombre_pedido.innerHTML = pedidos[i]["Nombre"];
				item.appendChild(cuerpo_nombre_pedido);

				let cuerpo_unidades = document.createElement("td");
				cuerpo_unidades.innerHTML = pedidos[i]["Unidades"];
				item.appendChild(cuerpo_unidades);

				tabla.appendChild(item);
			}

			let contenido = document.getElementById("contenido");
			contenido.innerHTML = "";
			let titulo = document.getElementById("titulo");
			titulo.innerHTML = "Historial de pedidos";
			contenido.appendChild(tabla);
		}
	};
	xhttp.open("GET", "historialPedidos.php", true);
	xhttp.send();
	return false;
};

function cargarClientes() {
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			let clientes = JSON.parse(this.responseText);
			let tabla = document.createElement("table");
			let cabecera = document.createElement("tr");

			let cab_cod = document.createElement("th");
			cab_cod.innerHTML = "Codigo";
			cabecera.appendChild(cab_cod);

			let cab_nombre = document.createElement("th");
			cab_nombre.innerHTML = "Nombre";
			cabecera.appendChild(cab_nombre);

			let cab_apellidos = document.createElement("th");
			cab_apellidos.innerHTML = "Apellidos";
			cabecera.appendChild(cab_apellidos);

			let cab_correo = document.createElement("th");
			cab_correo.innerHTML = "Correo";
			cabecera.appendChild(cab_correo);

			tabla.appendChild(cabecera);

			for (let i = 0; i < clientes.length; i++) {
				let cuerpo = document.createElement("tr");

				let cuerpo_cod = document.createElement("td");
				cuerpo_cod.innerHTML = clientes[i]["ID_Cliente"];
				cuerpo.appendChild(cuerpo_cod);

				let cuerpo_nombre = document.createElement("td");
				cuerpo_nombre.innerHTML = clientes[i]["Nombre"];
				cuerpo.appendChild(cuerpo_nombre);

				let cuerpo_apellidos = document.createElement("td");
				cuerpo_apellidos.innerHTML = clientes[i]["Apellidos"];
				cuerpo.appendChild(cuerpo_apellidos);

				let cuerpo_correo = document.createElement("td");
				cuerpo_correo.innerHTML = clientes[i]["Correo"];
				cuerpo.appendChild(cuerpo_correo);

				tabla.appendChild(cuerpo);
			};
			let contenido = document.getElementById("contenido");
			contenido.appendChild(tabla);
		}
	};
	xhttp.open("GET", "clientes.php", true);
	xhttp.send();
	return false;
}

function cargarAdmins() {
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			let admins = JSON.parse(this.responseText);
			let tabla = document.createElement("table");
			let cabecera = document.createElement("tr");

			let cab_cod = document.createElement("th");
			cab_cod.innerHTML = "Codigo";
			cabecera.appendChild(cab_cod);

			let cab_nombre = document.createElement("th");
			cab_nombre.innerHTML = "Nombre";
			cabecera.appendChild(cab_nombre);

			let cab_apellidos = document.createElement("th");
			cab_apellidos.innerHTML = "Apellidos";
			cabecera.appendChild(cab_apellidos);

			let cab_correo = document.createElement("th");
			cab_correo.innerHTML = "Correo";
			cabecera.appendChild(cab_correo);

			tabla.appendChild(cabecera);

			for (let i = 0; i < admins.length; i++) {
				let cuerpo = document.createElement("tr");

				let cuerpo_cod = document.createElement("td");
				cuerpo_cod.innerHTML = admins[i]["ID_Admin"];
				cuerpo.appendChild(cuerpo_cod);

				let cuerpo_nombre = document.createElement("td");
				cuerpo_nombre.innerHTML = admins[i]["Nombre"];
				cuerpo.appendChild(cuerpo_nombre);

				let cuerpo_apellidos = document.createElement("td");
				cuerpo_apellidos.innerHTML = admins[i]["Apellidos"];
				cuerpo.appendChild(cuerpo_apellidos);

				let cuerpo_correo = document.createElement("td");
				cuerpo_correo.innerHTML = admins[i]["Correo"];
				cuerpo.appendChild(cuerpo_correo);

				tabla.appendChild(cuerpo);
			};
			let contenido = document.getElementById("contenido");
			contenido.appendChild(tabla);
		}
	};
	xhttp.open("GET", "admins.php", true);
	xhttp.send();
	return false;
}

function mod_cliente() {

	let contenido = document.getElementById("contenido");
	contenido.innerHTML = "";
	cargarClientes();
	let form = document.createElement("form");

	form.setAttribute("onsubmit", "return procesar_mod_cliente()");

	let label_cod = document.createElement("label");
	label_cod.htmlFor = "codigo";
	label_cod.innerHTML = "Codigo";
	form.appendChild(label_cod);

	let input_cod = document.createElement("input");
	input_cod.id = "codigo";
	input_cod.type = "number";
	form.appendChild(input_cod);

	let label_nom = document.createElement("label");
	label_nom.htmlFor = "nombre";
	label_nom.innerHTML = "Nombre";
	form.appendChild(label_nom);


	let input_nom = document.createElement("input");
	input_nom.id = "nombre";
	input_nom.type = "text";
	form.appendChild(input_nom);


	let label_ape = document.createElement("label");
	label_ape.htmlFor = "apellidos";
	label_ape.innerHTML = "Apellidos";
	form.appendChild(label_ape);

	let input_ape = document.createElement("input");
	input_ape.id = "apellidos";
	input_ape.type = "text";
	form.appendChild(input_ape);

	let label_corr = document.createElement("label");
	label_corr.htmlFor = "correo";
	label_corr.innerHTML = "Correo";
	form.appendChild(label_corr);

	let input_corr = document.createElement("input");
	input_corr.id = "correo_mod";
	input_corr.type = "text";
	form.appendChild(input_corr);

	let label_cont = document.createElement("label");
	label_cont.htmlFor = "contraseña";
	label_cont.innerHTML = "Contraseña";
	form.appendChild(label_cont);

	let input_cont = document.createElement("input");
	input_cont.id = "contraseña";
	input_cont.type = "text";
	form.appendChild(input_cont);

	let submit = document.createElement("input");
	submit.type = "submit";
	submit.value = "Enviar";
	form.appendChild(submit);

	contenido.appendChild(form);
}

function procesar_mod_cliente() {
	let codigo = document.getElementById("codigo").value;
	let nombre = document.getElementById("nombre").value;
	let apellidos = document.getElementById("apellidos").value;
	let correo = document.getElementById("correo_mod").value;
	let cont = document.getElementById("contraseña").value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "TRUE") {
				alert("Cliente modificado");
				inicioAdmin();
			} else {
				alert("Hubo un error");
				inicioAdmin();
			}
		}
	};
	var params = "codigo=" + codigo + "&nombre=" + nombre + "&apellidos=" + apellidos + "&correo=" + correo + "&cont=" + cont;
	xhttp.open("POST", "procesar_mod_cliente.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(params);
	return false;
}

function del_cliente() {

	let contenido = document.getElementById("contenido");
	contenido.innerHTML = "";
	cargarClientes();
	let form = document.createElement("form");

	form.setAttribute("onsubmit", "return procesar_del_cliente()");


	let label_corr = document.createElement("label");
	label_corr.htmlFor = "correo_mod_del";
	label_corr.innerHTML = "Correo";
	form.appendChild(label_corr);

	let input_corr = document.createElement("input");
	input_corr.id = "correo_mod_del";
	input_corr.type = "text";
	form.appendChild(input_corr);

	let submit = document.createElement("input");
	submit.type = "submit";
	submit.value = "Enviar";
	form.appendChild(submit);

	contenido.appendChild(form);
}

function procesar_del_cliente() {
	let correo = document.getElementById("correo_mod_del").value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "TRUE") {
				alert("Cliente eliminado");
				inicioAdmin();
			} else {
				alert("Hubo un error");
				inicioAdmin();
			}
		}
	};
	var params = "correo=" + correo;
	xhttp.open("POST", "procesar_del_cliente.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(params);
	return false;
}

function add_admin() {

	let contenido = document.getElementById("contenido");
	contenido.innerHTML = "";
	let form = document.createElement("form");

	form.setAttribute("onsubmit", "return procesar_add_admin()");

	let label_nom = document.createElement("label");
	label_nom.htmlFor = "nombre";
	label_nom.innerHTML = "Nombre";
	form.appendChild(label_nom);

	let input_nom = document.createElement("input");
	input_nom.id = "nombre";
	input_nom.type = "text";
	form.appendChild(input_nom);


	let label_ape = document.createElement("label");
	label_ape.htmlFor = "apellidos";
	label_ape.innerHTML = "Apellidos";
	form.appendChild(label_ape);

	let input_ape = document.createElement("input");
	input_ape.id = "apellidos";
	input_ape.type = "text";
	form.appendChild(input_ape);

	let label_corr = document.createElement("label");
	label_corr.htmlFor = "correo";
	label_corr.innerHTML = "Correo";
	form.appendChild(label_corr);

	let input_corr = document.createElement("input");
	input_corr.id = "correo_add";
	input_corr.type = "text";
	form.appendChild(input_corr);

	let label_cont = document.createElement("label");
	label_cont.htmlFor = "contraseña";
	label_cont.innerHTML = "Contraseña";
	form.appendChild(label_cont);

	let input_cont = document.createElement("input");
	input_cont.id = "contraseña";
	input_cont.type = "text";
	form.appendChild(input_cont);

	let submit = document.createElement("input");
	submit.type = "submit";
	submit.value = "Enviar";
	form.appendChild(submit);

	contenido.appendChild(form);
}

function procesar_add_admin() {
	let nombre = document.getElementById("nombre").value;
	let apellidos = document.getElementById("apellidos").value;
	let correo = document.getElementById("correo_add").value;
	let cont = document.getElementById("contraseña").value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "TRUE") {
				alert("Administrador añadido");
				inicioAdmin();
			} else {
				alert("Hubo un error");
				inicioAdmin();
			}
		}
	};
	var params = "nombre=" + nombre + "&apellidos=" + apellidos + "&correo=" + correo + "&cont=" + cont;
	xhttp.open("POST", "procesar_add_admin.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(params);
	return false;
}

function mod_admin() {

	let contenido = document.getElementById("contenido");
	contenido.innerHTML = "";
	cargarAdmins();
	let form = document.createElement("form");

	form.setAttribute("onsubmit", "return procesar_mod_admin()");

	let label_cod = document.createElement("label");
	label_cod.htmlFor = "codigo";
	label_cod.innerHTML = "Codigo";
	form.appendChild(label_cod);

	let input_cod = document.createElement("input");
	input_cod.id = "codigo";
	input_cod.type = "number";
	form.appendChild(input_cod);

	let label_nom = document.createElement("label");
	label_nom.htmlFor = "nombre";
	label_nom.innerHTML = "Nombre";
	form.appendChild(label_nom);


	let input_nom = document.createElement("input");
	input_nom.id = "nombre";
	input_nom.type = "text";
	form.appendChild(input_nom);


	let label_ape = document.createElement("label");
	label_ape.htmlFor = "apellidos";
	label_ape.innerHTML = "Apellidos";
	form.appendChild(label_ape);

	let input_ape = document.createElement("input");
	input_ape.id = "apellidos";
	input_ape.type = "text";
	form.appendChild(input_ape);

	let label_corr = document.createElement("label");
	label_corr.htmlFor = "correo";
	label_corr.innerHTML = "Correo";
	form.appendChild(label_corr);

	let input_corr = document.createElement("input");
	input_corr.id = "correo_mod";
	input_corr.type = "text";
	form.appendChild(input_corr);

	let label_cont = document.createElement("label");
	label_cont.htmlFor = "contraseña";
	label_cont.innerHTML = "Contraseña";
	form.appendChild(label_cont);

	let input_cont = document.createElement("input");
	input_cont.id = "contraseña";
	input_cont.type = "text";
	form.appendChild(input_cont);

	let submit = document.createElement("input");
	submit.type = "submit";
	submit.value = "Enviar";
	form.appendChild(submit);

	contenido.appendChild(form);
}

function procesar_mod_admin() {
	let codigo = document.getElementById("codigo").value;
	let nombre = document.getElementById("nombre").value;
	let apellidos = document.getElementById("apellidos").value;
	let correo = document.getElementById("correo_mod").value;
	let cont = document.getElementById("contraseña").value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "TRUE") {
				alert("Administrador modificado");
				inicioAdmin();
			} else {
				alert("Hubo un error");
				inicioAdmin();
			}
		}
	};
	var params = "codigo=" + codigo + "&nombre=" + nombre + "&apellidos=" + apellidos + "&correo=" + correo + "&cont=" + cont;
	xhttp.open("POST", "procesar_mod_admin.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(params);
	return false;
}

function del_admin() {

	let contenido = document.getElementById("contenido");
	contenido.innerHTML = "";
	cargarAdmins();
	let form = document.createElement("form");

	form.setAttribute("onsubmit", "return procesar_del_admin()");


	let label_corr = document.createElement("label");
	label_corr.htmlFor = "correo_mod_del";
	label_corr.innerHTML = "Correo";
	form.appendChild(label_corr);

	let input_corr = document.createElement("input");
	input_corr.id = "correo_mod_del";
	input_corr.type = "text";
	form.appendChild(input_corr);

	let submit = document.createElement("input");
	submit.type = "submit";
	submit.value = "Enviar";
	form.appendChild(submit);

	contenido.appendChild(form);
}

function procesar_del_admin() {
	let correo = document.getElementById("correo_mod_del").value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "TRUE") {
				alert("Administrador eliminado");
				inicioAdmin();
			} else {
				alert("Hubo un error");
				inicioAdmin();
			}
		}
	};
	var params = "correo=" + correo;
	xhttp.open("POST", "procesar_del_admin.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(params);
	return false;
}

function add_producto() {
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			let num_cats = JSON.parse(this.responseText);
			let contenido = document.getElementById("contenido");
			contenido.innerHTML = "";
			let form = document.createElement("form");

			form.setAttribute("onsubmit", "return procesar_add_prod()");


			let label_nombre = document.createElement("label");
			label_nombre.htmlFor = "nombre";
			label_nombre.innerHTML = "Nombre";
			form.appendChild(label_nombre);

			let input_nombre = document.createElement("input");
			input_nombre.id = "nombre";
			input_nombre.type = "text";
			form.appendChild(input_nombre);

			let label_stock = document.createElement("label");
			label_stock.htmlFor = "stock";
			label_stock.innerHTML = "Stock";
			form.appendChild(label_stock);

			let input_stock = document.createElement("input");
			input_stock.id = "stock";
			input_stock.type = "number";
			input_stock.min="1";
			form.appendChild(input_stock);

			let label_precio = document.createElement("label");
			label_precio.htmlFor = "precio";
			label_precio.innerHTML = "Precio";
			form.appendChild(label_precio);

			let input_precio = document.createElement("input");
			input_precio.id = "precio";
			input_precio.type = "number";
			form.appendChild(input_precio);

			let select = document.createElement("select");
			select.id="cat";

			for (let i = 0; i < num_cats.length; i++) {
				let option = document.createElement("option");
				option.value = i + 1;
				option.innerHTML = num_cats[i]["ID_Cat"];
				select.appendChild(option);
			}

			form.appendChild(select);

			let submit = document.createElement("input");
			submit.type = "submit";
			submit.value = "Añadir producto";
			form.appendChild(submit);

			contenido.appendChild(form);
		}
	};
	xhttp.open("GET", "categorias_productos.php", true);
	xhttp.send();
	return false;
}

function procesar_add_prod(){
	let nombre = document.getElementById("nombre").value;
	let stock = document.getElementById("stock").value;
	let precio = document.getElementById("precio").value;
	let cat = document.getElementById("cat").value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "TRUE") {//Aunque da true siempre da la otra opcion
				alert("Producto Añadido");
				inicioAdmin();
			} else {
				alert("Hubo un error");
				inicioAdmin();
			}
		}
	};
	var params = "nombre="+nombre+"&stock="+stock+"&precio="+precio+"&cat="+cat;
	xhttp.open("POST", "procesar_add_prod.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(params);
	return false;
}

function infoProductos() {
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			let prod = JSON.parse(this.responseText);
			let tabla = document.createElement("table");
			let cabecera = document.createElement("tr");

			let cab_cod = document.createElement("th");
			cab_cod.innerHTML = "Codigo";
			cabecera.appendChild(cab_cod);

			let cab_nombre = document.createElement("th");
			cab_nombre.innerHTML = "Nombre";
			cabecera.appendChild(cab_nombre);

			let cab_Stock = document.createElement("th");
			cab_Stock.innerHTML = "Stock";
			cabecera.appendChild(cab_Stock);

			tabla.appendChild(cabecera);

			for (let i = 0; i < prod.length; i++) {
				let cuerpo = document.createElement("tr");

				let cuerpo_cod = document.createElement("td");
				cuerpo_cod.innerHTML = prod[i]["ID_Producto"];
				cuerpo.appendChild(cuerpo_cod);

				let cuerpo_nombre = document.createElement("td");
				cuerpo_nombre.innerHTML = prod[i]["nombre"];
				cuerpo.appendChild(cuerpo_nombre);

				let cuerpo_stock = document.createElement("td");
				cuerpo_stock.innerHTML = prod[i]["stock"];
				cuerpo.appendChild(cuerpo_stock);

				tabla.appendChild(cuerpo);
			};
			let contenido = document.getElementById("contenido");
			contenido.appendChild(tabla);
		}
	};
	xhttp.open("GET", "infoProd.php", true);
	xhttp.send();
	return false;
}

function del_producto() {
	let contenido = document.getElementById("contenido");
	contenido.innerHTML = "";
	infoProductos();
	let form = document.createElement("form");

	form.setAttribute("onsubmit", "return procesar_del_prod()");


	let label_nombre = document.createElement("label");
	label_nombre.htmlFor = "codigo";
	label_nombre.innerHTML = "Codigo";
	form.appendChild(label_nombre);

	let input_nombre = document.createElement("input");
	input_nombre.id = "codigo";
	input_nombre.type = "number";
	form.appendChild(input_nombre);

	let submit = document.createElement("input");
	submit.type = "submit";
	submit.value = "Eliminar producto";
	form.appendChild(submit);

	contenido.appendChild(form);
}

function procesar_del_prod() {
	let codigo = document.getElementById("codigo").value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "TRUE") {
				alert("Producto eliminado");
				inicioAdmin();
			} else {
				alert("Hubo un error");
				inicioAdmin();
			}
		}
	};
	var params = "codigo="+codigo;
	xhttp.open("POST", "procesar_del_prod.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(params);
	return false;
}

function infoCats() {
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			let cat = JSON.parse(this.responseText);
			let tabla = document.createElement("table");
			let cabecera = document.createElement("tr");

			let cab_cod = document.createElement("th");
			cab_cod.innerHTML = "Nombre";
			cabecera.appendChild(cab_cod);

			tabla.appendChild(cabecera);

			for (let i = 0; i < cat.length; i++) {
				let cuerpo = document.createElement("tr");

				let cuerpo_nombre = document.createElement("td");
				cuerpo_nombre.innerHTML = cat[i]["nombre"];
				cuerpo.appendChild(cuerpo_nombre);

				tabla.appendChild(cuerpo);
			};
			let contenido = document.getElementById("contenido");
			contenido.appendChild(tabla);
		}
	};
	xhttp.open("GET", "infoCat.php", true);
	xhttp.send();
	return false;
}

function add_cat() {
	let contenido = document.getElementById("contenido");
	contenido.innerHTML = "";
	infoCats();
	let form = document.createElement("form");

	form.setAttribute("onsubmit", "return procesar_add_cat()");


	let label_nombre = document.createElement("label");
	label_nombre.htmlFor = "nombre";
	label_nombre.innerHTML = "Nombre";
	form.appendChild(label_nombre);

	let input_nombre = document.createElement("input");
	input_nombre.id = "nombre";
	input_nombre.type = "text";
	form.appendChild(input_nombre);

	let submit = document.createElement("input");
	submit.type = "submit";
	submit.value = "Añadir Categoria";
	form.appendChild(submit);

	contenido.appendChild(form);
}

function procesar_add_cat() {
	let nombre = document.getElementById("nombre").value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "TRUE") {
				alert("Categoria Añadida");
				inicioAdmin();
			} else {
				alert("Hubo un error");
				inicioAdmin();
			}
		}
	};
	var params = "nombre="+nombre;
	xhttp.open("POST", "procesar_add_prod.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(params);
	return false;
}

function add_stock() {
	let contenido = document.getElementById("contenido");
	contenido.innerHTML = "";
	infoProductos();
	let form = document.createElement("form");

	form.setAttribute("onsubmit", "return procesar_add_stock()");


	let label_codigo = document.createElement("label");
	label_codigo.htmlFor = "codigo";
	label_codigo.innerHTML = "Codigo";
	form.appendChild(label_codigo);

	let input_codigo = document.createElement("input");
	input_codigo.id = "codigo";
	input_codigo.type = "text";
	form.appendChild(input_codigo);

	let label_stock = document.createElement("label");
	label_stock.htmlFor = "stock";
	label_stock.innerHTML = "Stock";
	form.appendChild(label_stock);

	let input_stock = document.createElement("input");
	input_stock.id = "stock";
	input_stock.type = "number";
	input_stock.min="0";
	form.appendChild(input_stock);

	let submit = document.createElement("input");
	submit.type = "submit";
	submit.value = "Añadir Stock";
	form.appendChild(submit);

	contenido.appendChild(form);
}

function procesar_add_stock() {
	let codigo = document.getElementById("codigo").value;
	let stock = document.getElementById("stock").value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "TRUE") {
				alert("Stock Añadido");
				inicioAdmin();
			} else {
				alert("Hubo un error");
				inicioAdmin();
			}
		}
	};
	var params = "codigo="+codigo+"&stock="+stock;
	xhttp.open("POST", "añadirStock.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(params);
	return false;
}
	
