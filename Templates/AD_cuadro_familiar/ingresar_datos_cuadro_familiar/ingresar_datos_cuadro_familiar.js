function eval_select (id_select, id_input) {
	evaluar = document.getElementById(id_select);
	cambio  = document.getElementById(id_input);
	if (evaluar.value == 'otro') {cambio.type = 'text';}
	else {cambio.type = 'hidden';}
}

function validar_datos () {
	var form = document.datos_cuadro_familiar;
		if (form.id_persona.value == '' ) {
			document.getElementById("div_id_persona").innerHTML = "Elija un trabajador";
			return false;
		}else {
			document.getElementById("div_id_persona").innerHTML = "";
		}
		if (form.id_parentesco.value == '' ) {
			document.getElementById("div_id_parentesco").innerHTML = "Elija un parentesco";
			return false;
		}else {
			document.getElementById("div_id_parentesco").innerHTML = "";
		}
		form.	submit();
}
