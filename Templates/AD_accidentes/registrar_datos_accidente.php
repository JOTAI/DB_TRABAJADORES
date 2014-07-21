<?php 
if($acceso == 1) {

	$accidentes = new accidentes();
	$personal = new personal();
	
	$id_persona_env = $_POST["id_persona"]; 
	
	if($personal->verificar_trabajador($id_persona_env)) {
	
		$accidente = $_POST["accidente"];
		$accion = $_POST["accion"];
		
		if($accidentes->registrar_accidente($id_persona_env, $accidente, $accion)){
			echo "<script type='text/javascript'>
				alert('Se ha guardado el accidente');
				history.back();
				</script>";
		}else {
			echo "<script type='text/javascript'>
				alert('No se ha logrado guardar el accidente');
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