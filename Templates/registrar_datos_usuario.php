<?php 
session_start();
$id_persona = $_SESSION["id_persona"];
if($id_persona) {		
	if( !empty($_POST)){
		require_once ("../require/usuarios_class.php");
		
		$usuario = new usuarios();
		$registrar = true;
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
				
				if(isset($_POST['clave_antigua'])){
					$reg_usuario = $usuario->ver_datos_usuario($id_persona_env);
					if(strcmp($_POST['clave_antigua'],$reg_usuario['clave']) != 0 ){
						$registrar = false;
						?>
						<div id="dato_incorrecto">
								LA CLAVE ANTIGUA ES INCORRECTA
						</div>
						<?php
					}
				}
				
				$clave_1 = $_POST['clave_1'];
				$clave_2 = $_POST['clave_2']; 
				
				if(strcmp($clave_1,$clave_2) != 0) {
					$registrar = false;
					?>
					<div id="dato_incorrecto">
							LAS CLAVES NUEVAS NO COINCIDEN
					</div>
					<?php
				}
				
				$usuario_env = $_POST["usuario"];
				
				if($registrar){
					if($usuario->cambiar_usuario($id_persona_env, $usuario_env, $clave_1)) {
					?>
					<div id="dato_correcto">
									LOS DATOS HAN SIDO ENVIADOS CORRECTAMENTE
					</div>
					<?php 
					}else {
					?>
					<div id="dato_incorrecto">
									LOS DATOS NO SE HAN PROCESADO CORRECTAMENTE
					</div>
					<?php
					}
				} else {
				?>
				<div id="dato_incorrecto">
								NO SE HAN REGISTRADO LOS DATOS
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