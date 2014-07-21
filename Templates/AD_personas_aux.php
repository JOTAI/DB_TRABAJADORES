<?php 
session_start();
$id_persona = $_SESSION["id_persona"];
if($id_persona) {
	require_once ("../require/obligaciones_class.php");
	require_once ("../require/personas_class.php");
	require_once ("../require/trabajos_class.php");
	require_once ("../require/tareas_class.php");
	
	require_once ("../require/cond_trab_class.php");
	require_once ("../require/personal_class.php");
	require_once ("../require/usuarios_class.php");
	
	$tarea_actual = "AD_PERSONAS";	
	$obligaciones = new obligaciones();
	$persona = new personas();
	$persona->establecer_persona($id_persona);
	$id_trabajo = $persona->retornar_id_trabajo();
	if($obligaciones->verificar_tarea($id_trabajo,$tarea_actual)) {
		
		if( !empty($_POST)) {
			$acceso = 1;
			if (isset($_POST['Registrar'])){
				include_once ("AD_personas/AD_personas_registrar.php");
			}
			elseif(isset($_POST['Quitar_trabajador'])) {
				$personal = new personal();
				$personal->desactivar_trabajador($_POST["id_persona"]);
				header('Location: AD_personas.php');
			}
			elseif(isset($_POST['Agregar_trabajador'])) {
				include_once ("AD_personas/AD_personas_registrar.php");
			}
			elseif(isset($_POST['Agregar_usuario'])) {
				include_once ("AD_personas/AD_personas_registrar.php");
			}
			elseif(isset($_POST['Quitar_usuario'])) {
				$usuario = new usuarios();
				$usuario->desactivar_usuario($_POST["id_persona"]);
				header('Location: AD_personas.php');
			}
			elseif(isset($_POST['Editar_persona'])) {
				include_once ("AD_personas/AD_personas_registrar.php");
			}
			
		}
		else {
			include_once ("../Include/no_dato_POST.php");
		}		
			
	}
	else {
			include_once ("../Include/no_tarea.php");
			}	
}
else {
		include_once ("../Include/no_acceso.php");
		}
?>