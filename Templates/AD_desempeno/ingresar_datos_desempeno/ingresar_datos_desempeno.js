function validar_datos () {
	var form = document.datos_desempeno;
		if (form.id_persona.value == '' ) {
			document.getElementById("div_id_persona").innerHTML = "Elija un trabajador";
			return false;
		}else {
			document.getElementById("div_id_persona").innerHTML = "";
		}
		if (form.comentario.value == '' ) {
			document.getElementById("div_comentario").innerHTML = "Escriba un comentario";
			return false;
		}else {
			document.getElementById("div_comentario").innerHTML = "";
		}
		form.	submit();
}
