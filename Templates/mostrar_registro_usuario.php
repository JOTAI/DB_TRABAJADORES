<?php 
session_start();

require_once ("../require/usuarios_class.php");

if(!empty($_GET)){
	$id_persona = $_GET["id"];
	$usuario = new usuarios();
	
	if ($usuario->verificar_usuario($id_persona) ) {
		
		if ($reg_usuario=$usuario->ver_datos_usuario($id_persona) ){
?>

<html>
	<head>
		<link href="../Estilos/tareas_estilo.css" type="text/css" rel="stylesheet" >
	</head>
	<body>
		<div>
			<table width="400" align="center">
				<tr >
					<td width="200" id="tabla1_encabezado">
						Usuario
					</td>
					<td width="200" id="tabla1_informacion">
						<?php echo $reg_usuario['usuario'];?>
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