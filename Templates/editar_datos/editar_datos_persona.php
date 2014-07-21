<?php 
if($acceso == 1 ) {
	if ($reg_persona = $persona->ver_datos_persona($id_persona_env)){
		$trabajos = new trabajos();
		
?>
		<div id="mensaje_registro_persona">
			
		</div>
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
						<input type="text" name="primer_nombre" value="<?php echo $reg_persona['primer_nombre'];?>" >
					</td>
					<td width="200">
						<input type="text" name="ap_paterno" value="<?php echo $reg_persona['ap_paterno'];?>" >
					</td>
					<td width="200">
						<input type="text" name="ap_materno" value="<?php echo $reg_persona['ap_materno'];?>" >
					</td>											
					<td>
						<select name="id_trabajo">
							<?php  												
							$trabajos->ver_trabajos();
									while($op_trabajo = $trabajos->retornar_SELECT()) {
							?>
							<option value="<?php echo $op_trabajo['id_trabajo'];?>" 
							<?php if ($op_trabajo['id_trabajo'] == $reg_persona['id_trabajo']){echo "selected";}?> >
							<?php echo $op_trabajo['nom_trabajo']?>
							</option>
							<?php }?>
						</select>
					</td>
				</tr>
			</table>
			<br>
			<div id="subtitulo1">
			<input type="submit" value="ENVIAR DATOS PERSONA" name="enviar">
			</div>
<?php
	}
}
?>