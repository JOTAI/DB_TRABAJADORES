<?php 

if($acceso == 1) {
	$personal = new personal();
	$usuario = new usuarios();
	
	if(isset($_POST['id_persona'])) { $id_persona_env = $_POST["id_persona"];}
	if(isset($_POST['Registrar'])){
		$primer_nombre_env = $_POST["primer_nombre"];
		$ap_paterno_env = $_POST["ap_paterno"];
		$ap_materno_env = $_POST["ap_materno"];
		$id_trabajo_env = $_POST["id_trabajo"];
		$id_persona_env = $persona->registrar_persona($primer_nombre_env, $ap_paterno_env, $ap_materno_env, $id_trabajo_env);
	}elseif(isset($_POST['Agregar_trabajador']) or isset($_POST['Registrar_trabajador']) or isset($_POST['Registrar_ambos']) ) {
		$cond_trab = new cond_trab();
		$id_registro_trab = $personal->verificar_registrar($id_persona_env);
		$cond_trab->ingresar_trab($id_persona_env);
	}elseif(isset($_POST['Agregar_usuario']) or isset($_POST['Registrar_usuario']) or isset($_POST['Registrar_ambos']) ) {
		$id_registro_user = $usuario->verificar_registrar($id_persona_env);
	}
	/*
	elseif(isset($_POST['Editar_persona'])) {
		if($personal->verificar_trabajador($id_persona_env) ) {
			$id_registro_trab = $personal->obtener_id_dato($id_persona_env);
		}if($usuario->verificar_usuario($id_persona_env) ) {
			$id_registro_user = $usuario->obtener_id_usuario($id_persona_env);
		}
	}*/
	
}

?>