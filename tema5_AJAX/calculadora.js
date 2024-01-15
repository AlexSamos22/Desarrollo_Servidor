function calcular() {
    let primerNumero = document.getElementById("1").value;
    let segundoNumero = document.getElementById("2").value;
    let resultado = parseInt(primerNumero) + parseInt(segundoNumero);

    document.getElementById("resultado").innerHTML = resultado;
}



