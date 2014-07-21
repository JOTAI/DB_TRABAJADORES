<?php 
session_start();

require_once ("../require/personas_class.php");
require_once ("../require/personal_class.php");
require_once ("../require/cond_trab_class.php");
require_once ("../require/nombre_persona_func.php");
require_once ("../require/cuadro_familiar_class.php");
require_once ("../require/parentesco_class.php");
require_once ("../require/experiencia_laboral_class.php");
require_once ("../require/categorias_class.php");
require_once ("../require/desempenos_class.php");
require_once ("../require/accidentes_class.php");


if(!empty($_GET)){
	$id_persona = $_GET["id"];
	$personal = new personal();
	$cond_trabajo = new cond_trab();
	$cuadro_familiar = new cuadro_familiar();
	$experiencia_laboral = new experiencia_laboral();
	$desempeno = new desempenos();
	$accidente = new accidentes();
	$id_persona_env = $id_persona;
	if ($personal->verificar_trabajador($id_persona) ) {
		
?>

<html>
	<head>
		<link href="mostrar_registro_trabajador/mostrar_registro_trabajador.css" type="text/css" rel="stylesheet" >
	</head>
	<body>
		<div>
			<?php 
			if ($reg_personal=$personal->ver_datos_trabajador($id_persona) ){
				include_once("mostrar_registro_trabajador/datos_generales.php");
			}else {
				echo "No se pudo acceder a la base de datos";
			}
			?>
			<br>
			<?php 
			if($cuadro_familiar->verificar_cuadro_familiar($id_persona) ) {
				$parentesco = new parentesco();
				include_once("mostrar_registro_trabajador/cuadro_familiar.php");
			}?>
			<br>
			<?php
			if($experiencia_laboral->verificar_experiencia_laboral($id_persona) ) {
				$categoria = new categorias();
				include_once("mostrar_registro_trabajador/experiencia_laboral.php");
			}?>
			<br>
			<?php 
			if($desempeno->verificar_desempenos ($id_persona) ) {
				$persona = new personas();
				include_once("mostrar_registro_trabajador/desempeno.php");
			}?>
			<br>
			<?php
			if($accidente->verificar_accidentes ($id_persona) ) {
				include_once("mostrar_registro_trabajador/accidentes.php");
			}?>
		</div>
	</body>
</html>
<?php 
		
	}
	else {
		echo "Codigo incorrecto de la persona";
	}
}
else {
	echo "No se ha recibido el dato correctamente.";
}
?>