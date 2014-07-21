<?php 
if($acceso == 1) {

	$cuadro_familiar = new cuadro_familiar();
	$parentesco = new parentesco();
	$personal = new personal();
	
	$id_persona_env = $_POST["id_persona"]; 
	
	if($personal->verificar_trabajador($id_persona_env)) {
	
		$familiar = $_POST["familiar"];
		$fecha_nac = $_POST["fecha_nac"];
		$DNI = $_POST["DNI"];
		
		if(strcmp ( $_POST["id_parentesco"] , 'otro' ) == 0) {
			$id_parentesco = $parentesco->nuevo_parentesco($_POST["otro_parentesco"]);
		} else {
			$id_parentesco = $_POST["id_parentesco"];
		}
		
		if($cuadro_familiar->registrar_familiar($id_persona_env, $familiar, $fecha_nac, $DNI, $id_parentesco)){
			echo "<script type='text/javascript'>
				alert('El familiar a sido registrado correctamente');
				history.back();
				</script>";
		}else {
			echo "<script type='text/javascript'>
				alert('No se ha logrado registrar este familiar');
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