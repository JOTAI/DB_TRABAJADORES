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
	
	$tarea_actual = "AD_PERSONAS";	
	$obligaciones = new obligaciones();
	$persona = new personas();
	$persona->establecer_persona($id_persona);
	$id_trabajo = $persona->retornar_id_trabajo();
	if($obligaciones->verificar_tarea($id_trabajo,$tarea_actual)) {
		
		if( !empty($_POST)) {
			$acceso = 1;
			$cond_trab = new cond_trab();
			if (isset($_POST['Cesar'])){
				$id_persona_env = $_POST["id_persona"];
				$cond_trab->cese_trab($id_persona_env);
				header('Location: AD_trabajadores.php');
			}
			elseif(isset($_POST['Ingresar'])) {
				$id_persona_env = $_POST["id_persona"];
				$cond_trab->ingresar_trab($id_persona_env);
				header('Location: AD_trabajadores.php');
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