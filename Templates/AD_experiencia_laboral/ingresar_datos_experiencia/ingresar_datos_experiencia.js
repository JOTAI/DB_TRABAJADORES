function eval_select (id_select, id_input) {
	evaluar = document.getElementById(id_select);
	cambio  = document.getElementById(id_input);
	if (evaluar.value == 'otro') {cambio.type = 'text';}
	else {cambio.type = 'hidden';}
}

function validar_datos () {
	var form = document.datos_experiencia_laboral;
		if (form.id_persona.value == '' ) {
			document.getElementById("div_id_persona").innerHTML = "Elija un trabajador";
			return false;
		}else {
			document.getElementById("div_id_persona").innerHTML = "";
		}
		if (form.id_categoria.value == '' ) {
			document.getElementById("div_id_categoria").innerHTML = "Elija una categoria";
			return false;
		}else {
			document.getElementById("div_id_categoria").innerHTML = "";
		}
		form.	submit();
}
