<?php 
session_start();

require_once ("../require/personas_class.php");
require_once ("../require/trabajos_class.php");

if(!empty($_GET)){
	$id_persona = $_GET["id"];
	$persona = new personas();
	$trabajo = new trabajos();
	
	if ($persona->verificar_persona($id_persona) ) {
		
		if ($reg_persona = $persona->ver_datos_persona($id_persona) ){
?>

<html>
	<head>
		<link href="../Estilos/tareas_estilo.css" type="text/css" rel="stylesheet" >
	</head>
	<body>
		<div>
			<table width="800" align="center">
				<tr id="tabla1_encabezado">
					<td width="200">
						Primer Nombre
					</td>
					<td width="200">
						Apellido Paterno
					</td>
					<td width="200">
						Apellido Materno
					</td>											
					<td width="200">
						Trabajo
					</td>
				</tr>
				<tr id="tabla1_informacion">
					<td width="200">
						<?php echo $reg_persona['primer_nombre'];?>
					</td>
					<td width="200">
						<?php echo $reg_persona['ap_paterno'];?>
					</td>
					<td width="200">
						<?php echo $reg_persona['ap_materno'];?>
					</td>											
					<td>
						<?php echo $trabajo->ver_nombre_trabajo($reg_persona["id_trabajo"] ); ?>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
<?php 
		}
		else {
			echo "No se pudo acceder a la base de datos";
		}
	}
	else {
		echo "Codigo incorrecto de la persona";
	}
}
else {
	echo "No se ha recibido el dato correctamente.";
}
?>