<?php 
session_start();
$id_persona = $_SESSION["id_persona"];
if($id_persona) {
	require_once ("../require/obligaciones_class.php");
	require_once ("../require/personas_class.php");
	require_once ("../require/trabajos_class.php");
	require_once ("../require/tareas_class.php");
	$tarea_actual = "AD_OBLIGACIONES";	
	$obligaciones = new obligaciones();
	$persona = new personas();
	$persona->establecer_persona($id_persona);
	$id_trabajo = $persona->retornar_id_trabajo();
	if($obligaciones->verificar_tarea($id_trabajo,$tarea_actual)) {
		
		if( !empty($_POST)) {
			$acceso = 1;
			if (isset($_POST['Asignar_tarea'])){	
				include_once ("AD_obligaciones/AD_obligaciones_asignar_tarea.php");
			}
			elseif(isset($_POST['Quitar_tarea'])) {
				include_once ("AD_obligaciones/AD_obligaciones_quitar_tarea.php");
			}
			elseif(isset($_POST['Asignar_trabajo'])) {
				include_once ("AD_obligaciones/AD_obligaciones_asignar_trabajo.php");
			}
			elseif(isset($_POST['Crear_trabajo'])) {
				include_once ("AD_obligaciones/AD_obligaciones_crear_trabajo.php");
			}
			elseif(isset($_POST['Cambiar_nom_trabajo'])) {
				include_once ("AD_obligaciones/AD_obligaciones_cambiar_nom_trabajo.php");
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