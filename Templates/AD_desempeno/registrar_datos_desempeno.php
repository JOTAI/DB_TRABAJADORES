<?php 
if($acceso == 1) {

	$desempeno = new desempenos();
	$personal = new personal();
	
	$id_persona_env = $_POST["id_persona"]; 
	
	if($personal->verificar_trabajador($id_persona_env)) {
	
		$comentario = $_POST["comentario"];
		$id_reportante = $id_persona;
		
		if($desempeno->registrar_desempeno($id_persona_env, $comentario, $id_reportante)){
			echo "<script type='text/javascript'>
				alert('Se ha guardado el comentario exitosamente');
				history.back();
				</script>";
		}else {
			echo "<script type='text/javascript'>
				alert('No se ha logrado guardar el comentario');
				history.back();
				</script>";
		}
	}elseif($personal->verificar_trabajador_desactivado($id_persona_env)) {
		echo "<script type='text/javascript'>
			alert('Esta persona no esta como trabajador');
			history.back();
			</script>";
	}else {
		echo "<script type='text/javascript'>
			alert('Esta persona no esta como trabajador o la persona no existe');
			history.back();
			</script>";
	}
}else {
	include_once ("../Include/no_acceso.php");
}
?>