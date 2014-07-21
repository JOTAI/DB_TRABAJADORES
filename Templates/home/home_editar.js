window.onload = function(){
   var persona = new enviar_form('mensaje_registro_persona', 'datos_persona', 'registrar_datos_persona.php');
	persona.loadform();
   var trabajador = new enviar_form('mensaje_registro_trabajador', 'datos_trabajador', 'registrar_datos_trabajador.php');
	trabajador.loadform();
	var usuario = new enviar_form('mensaje_registro_usuario', 'datos_usuario', 'registrar_datos_usuario.php');
	usuario.loadform();
}