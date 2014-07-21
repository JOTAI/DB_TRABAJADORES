<?php 
session_start();
$id_persona = $_SESSION["id_persona"];
if($id_persona) {		
	if( !empty($_POST)){
		require_once ("../require/personas_class.php");
		
		$persona = new personas();
?>
		<html>
			<head>
				<link href="../Estilos/tareas_estilo.css" type="text/css" rel="stylesheet" >
			</head>
			<body>
				<?php  
				
				if(isset($_POST['id_persona'])){
					$id_persona_env = $_POST["id_persona"];
				} else {
					$id_persona_env = $id_persona;
				}
				
				
				
				if(
				true
				){
				?>
				<div id="dato_correcto">
								LOS DATOS HAN SIDO ENVIADOS CORRECTAMENTE
				</div>
				<?php 
				} else {
				?>
				<div id="dato_incorrecto">
								LOS DATOS NO SE HAN PROCESADO CORRECTAMENTE
				</div>
				<?php 
				}
				?>
			</body>
		</html>
<?php		
	}
	else {
		echo "No se han recibido correctamente los datos.";
	}
}
else {
		echo "No se puede acceder.";
		}
?>