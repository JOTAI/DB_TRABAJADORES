<?php 
session_start();
$id_persona = $_SESSION["id_persona"];
if($id_persona) {
	require_once ("../require/obligaciones_class.php");
	require_once ("../require/personas_class.php");
	require_once ("../require/trabajos_class.php");
	require_once ("../require/tareas_class.php");

	require_once ("../require/personal_class.php");
	require_once ("../require/categorias_class.php");
	require_once ("../require/experiencia_laboral_class.php");
	
	
	$tarea_actual = "AD_EXPERIENCIA_LABORAL";	
	$obligaciones = new obligaciones();
	$persona = new personas();
	$persona->establecer_persona($id_persona);
	$id_trabajo = $persona->retornar_id_trabajo();
	if($obligaciones->verificar_tarea($id_trabajo,$tarea_actual)) {
		
		if( !empty($_POST)) {
			$acceso = 1;
			if (isset($_POST['Enviar_Experiencia'])){
				include_once ("AD_experiencia_laboral/registrar_datos_experiencia.php");
			}else {
				include_once ("../Include/no_dato_POST.php");
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