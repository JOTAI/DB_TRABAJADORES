<?php 
session_start();
$id_persona = $_SESSION["id_persona"];
if($id_persona) {
	require_once ("../require/obligaciones_class.php");
	require_once ("../require/personas_class.php");
	require_once ("../require/trabajos_class.php");
	require_once ("../require/tareas_class.php");
	
	require_once ("../require/personal_class.php");
	require_once ("../require/usuarios_class.php");
	require_once ("../require/nombre_persona_func.php");
	
	$tarea_actual = "HOME";	
	$obligaciones = new obligaciones();
	$persona = new personas();
	$persona->establecer_persona($id_persona);
	$id_trabajo = $persona->retornar_id_trabajo();
	if($obligaciones->verificar_tarea($id_trabajo,$tarea_actual)) {
		$trabajos = new trabajos();
		$tareas = new tareas();
		$personal = new personal();
		$usuario = new usuarios();
/* ..................................................................................................................... */

?>

<html>
	<head>
		<title>..::<?php echo $tarea_actual; ?>::..</title>
		<link href="../Estilos/tareas_estilo.css" type="text/css" rel="stylesheet" >
		<script type="text/javascript" language="javascript" src="../JavaScript/validacion_input_1.js" ></script>
		<script type="text/javascript" languaje="javascript" src="../JavaScript/refreshDivs_1_ajax.js"></script>
		<script type="text/javascript" languaje="javascript" src="home/home.js"></script>
		<script type='text/javascript' languaje='javascript'>
			window.onload = function startrefresh(){
				refreshDivs_1 ('datos_usuario', 60, 'mostrar_registro_usuario.php', '<?php echo $id_persona; ?>');
				refreshDivs_1 ('datos_trabajador', 60, 'mostrar_registro_trabajador.php', '<?php echo $id_persona; ?>');
				refreshDivs_1 ('datos_persona', 60, 'mostrar_registro_persona.php', '<?php echo $id_persona; ?>');
			}
		</script>
	</head>
	<body>
		<div id="contenedor_tr">
			<div id="cabecera_tr">
				<?php include_once("../Include/cabecera_tarea.php");?>
			</div>
			<div id="cuerpo_tr">
				<div id="menu_izquierda_tr">
					<?php include_once("../Include/menu_obligaciones.php");?>
				</div>
				<div id="presentacion_tr">
					<div>
						<div id="titulo_tr">
							<h1><?php echo $tarea_actual; ?></h1>						
						</div>
						<br>
					</div>
					<div id="subtitulo1">
						<form action="home_aux.php" name="form_editar" method="POST">
							<input type="submit" name="Editar" Value="EDITAR DATOS">
						</form>
					</div>
					<div>
						<?php
							if($usuario->verificar_usuario($id_persona) ) {
						?>
								<div id="datos_usuario">
									
								</div>
								<br>
						<?php		
							}
							include_once ("AD_personas/AD_personas_pre_registro.php");
							if($personal->verificar_trabajador($id_persona) ) {
						?>
								<div id="datos_trabajador">
									
								</div>
						<?php
							} else {
						?>
								<div id="datos_persona">
								</div>
						<?php		
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<div id="pie_pagina_tr">
			<?php include_once("../Include/pie_pagina.php");?>
		</div>
	</body>
</html>

<?php 
/* ................................................................................................................. */
			}
	else {
			include_once ("../Include/no_tarea.php");
			}	
		}
else {
		include_once ("../Include/no_acceso.php");
		}

?>