   var persona = new enviar_form('mensaje_registro_persona', 'datos_persona', 'registrar_datos_persona.php');
   var trabajador = new enviar_form('mensaje_registro_trabajador', 'datos_trabajador', 'registrar_datos_trabajador.php');
	var usuario = new enviar_form('mensaje_registro_usuario', 'datos_usuario', 'registrar_datos_usuario.php');


window.onload = function(){
	persona.loadform();
	trabajador.loadform();
	usuario.loadform();
}
