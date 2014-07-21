<?php 
if($acceso == 1 ) {
	if ($reg_usuario = $usuario->ver_datos_usuario($id_persona_env)){
		
?>
		<div id="mensaje_registro_usuario">
			
		</div>
			<table width="600" align="center">
				<tr id="tabla1_encabezado">
					<td width="200">
						Usuario
					</td>
					<td width="200">
						Clave
					</td>
					<td width="200">
						Repetir Clave
					</td>
				</tr>
				<tr id="tabla1_input">
					<td width="200">
						<input type="text" name="usuario" value="<?php echo $reg_usuario['usuario'];?>">
					</td>
					<td width="200">
						<input type="password" name="clave_1" >
					</td>
					<td width="200">
						<input type="password" name="clave_2" >
					</td>
				</tr>
				<?php if($id_persona == $id_persona_env) {?>
				<tr>
					<td id="tabla1_encabezado">
						Clave antigua
					</td>
					<td id="tabla1_input">
						<input type="password" name="clave_antigua" >
					</td>
				</tr>
				<?php }?>
			</table>
			<br>
			<div id="subtitulo1">
			<input type="submit" value="ENVIAR DATOS USUARIO" name="enviar">
			</div>
<?php
	}
}
?>