<?php 
if($acceso == 1) {

	$experiencia_laboral = new experiencia_laboral();
	$categoria = new categorias();
	$personal = new personal();
	
	$id_persona_env = $_POST["id_persona"]; 
	
	if($personal->verificar_trabajador($id_persona_env)) {
	
		$nom_proyecto = $_POST["nom_proyecto"];
		$fecha_inicio = $_POST["fecha_inicio"];
		$fecha_fin = $_POST["fecha_fin"];
		
		if(strcmp ( $_POST["id_categoria"] , 'otro' ) == 0) {
			$id_categoria = $categoria->nuevo_categoria($_POST["otro_categoria"]);
		} else {
			$id_categoria = $_POST["id_categoria"];
		}
		
		if($experiencia_laboral->registrar_experiencia($id_persona_env, $nom_proyecto, $fecha_inicio, $fecha_fin, $id_categoria)){
			echo "<script type='text/javascript'>
				alert('Se a registrado correctamente la experiencia laboral');
				history.back();
				</script>";
		}else {
			echo "<script type='text/javascript'>
				alert('No se ha logrado registrar la experiencia laboral');
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