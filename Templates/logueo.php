<?php
session_start();
require_once ("../require/usuarios_class.php");
if( !empty($_POST)) {
	$usuario = new usuarios ();
	$usuario_env = $_POST["usuario"];
	$clave_env = $_POST["clave"];
	
	if($usuario->comprobar_usuario($usuario_env, $clave_env) == 1){
		$_SESSION["id_persona"]=$usuario->retornar_id_persona();
		header("Location: home.php");
	}
	else {
		echo "<script type='text/javascript'>
			alert('El usuario o la clave son incorrectas, o estan deshabilitados porfavor vuelva a intentarlo o consulte con el administrador');
			window.location.assign('index.php');
			</script>";
	}
}
else {
	include_once ("../Include/no_dato_POST.php");
}

?>