<?php
if($acceso == 1) {	
?>

<html>
	<head>
		<title>..::<?php echo $tarea_actual; ?>::..</title>
		<link href="../Estilos/tareas_estilo.css" type="text/css" rel="stylesheet" >
		<script type="text/javascript" language="javascript" src="../JavaScript/validacion_input_1.js" ></script>
		<script type="text/javascript" languaje="javascript" src="../JavaScript/funciones_ajax.js"></script>
		<script type="text/javascript" languaje="javascript" src="../JavaScript/enviar_form_ajax.js"></script>
		<script type="text/javascript" languaje="javascript" src="AD_personas/AD_personas_registrar.js"></script>
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
						<?php
							include_once ("AD_personas/AD_personas_pre_registro.php");
							if($personal->verificar_trabajador($id_persona_env) ) {
						?>
								<div>
									<form id="datos_trabajador" action="javascript:void(0);" method="POST" >
										<input type="hidden" name="id_persona" value="<?php echo $id_persona_env; ?>">
										<?php 
										include_once ("editar_datos/editar_datos_trabajador.php");
										?>
									</form>
								</div>
						<?php
							} else {
						?>
								<div>
									<form id="datos_persona" action="javascript:void(0);" method="POST" >
										<input type="hidden" name="id_persona" value="<?php echo $id_persona_env; ?>">
										<?php 
										include_once ("editar_datos/editar_datos_persona.php");
										?>
									</form>
								</div>
						<?php		
							}
							if($usuario->verificar_usuario($id_persona_env) ) {
						?>
								<div>
									<form id="datos_usuario" action="javascript:void(0);" method="POST" >
										<input type="hidden" name="id_persona" value="<?php echo $id_persona_env; ?>">
										<?php 
										include_once ("editar_datos/editar_datos_usuario.php");
										?>
									</form>
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
}
?>