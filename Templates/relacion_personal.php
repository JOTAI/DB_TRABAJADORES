<?php 
session_start();
$id_persona = $_SESSION["id_persona"];
if($id_persona) {
	require_once ("../require/obligaciones_class.php");
	require_once ("../require/personas_class.php");
	require_once ("../require/trabajos_class.php");
	require_once ("../require/tareas_class.php");
	
	require_once ("../require/personal_class.php");
	require_once ("../require/nombre_persona_func.php");
	
	$tarea_actual = "RELACION_DE_PERSONAL";	
	$obligaciones = new obligaciones();
	$persona = new personas();
	$persona->establecer_persona($id_persona);
	$id_trabajo = $persona->retornar_id_trabajo();
	if($obligaciones->verificar_tarea($id_trabajo,$tarea_actual)) {
		$trabajos = new trabajos();
		$tareas = new tareas();
		$personal = new personal();
/* ..................................................................................................................... */

?>

<html>
	<head>
		<title>..::<?php echo $tarea_actual; ?>::..</title>
		<link href="../Estilos/tareas_estilo.css" type="text/css" rel="stylesheet" >
		<script type="text/javascript" language="javascript" src="../JavaScript/validacion_input_1.js" ></script>
		<script type="text/javascript" languaje="javascript" src="../JavaScript/funciones_ajax.js"></script>
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
					<div>
						<div align="center">
							<table>
								<tr id="tabla1_encabezado">
									<td>
										No
									</td>
									<td>
										Codigo
									</td>
									<td>
										Apellidos y Nombre
									</td>
									<td>
									</td>
								</tr>
								<?php $personal->ver_relacion_personal();
										$cont_personal = 1; 
									while($rel_personal = $personal->retornar_SELECT() ) {
								?>
								<tr id="tabla1_informacion">
									<td>
										<?php echo $cont_personal;?>
									</td>
									<td>
										<?php echo $rel_personal["id_persona"]; ?>
									</td>
									<td>
										<?php echo nombre_persona($rel_personal); ?>
									</td>
									<form method="POST" action="relacion_personal_aux.php" name="ficha<?php echo $rel_personal['id_persona'];?>" >
									<td>
										<input type="hidden" value="<?php echo $rel_personal['id_persona'];?>" name="id_persona">
										<input type="submit" value="Ver Datos" name="Ver_Datos">
									</td>
									</form>
								</tr>
								<?php $cont_personal++; }?>
							</table>
						</div>
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