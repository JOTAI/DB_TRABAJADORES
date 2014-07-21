<div>
	<?php $trabajos = new trabajos();?>
	<form action="AD_personas_aux.php" method="POST" name="agregar_persona">
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
					<input type="text" name="primer_nombre">
				</td>
				<td width="200">
					<input type="text" name="ap_paterno">
				</td>
				<td width="200">
					<input type="text" name="ap_materno" >
				</td>											
				<td>
					<select name="id_trabajo">
						<?php  												
						$trabajos->ver_trabajos();
								while($op_trabajo = $trabajos->retornar_SELECT()) {
						?>
						<option value="<?php echo $op_trabajo['id_trabajo'];?>"><?php echo $op_trabajo['nom_trabajo']?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr id="tabla1_encabezado">
				<td >
					Registrar como:
					<input type="hidden" name="Registrar" value="Registrar">
				</td>
				<td>
					<input type="submit" name="Registrar_trabajador" value="Trabajador">
				</td>
				<td>
					<input type="submit" name="Registrar_usuario" value="Usuario">
				</td>
				<td>
					<input type="submit" name="Registrar_ambos" value="Usuario y Trabajador">
				</td>
			</tr>
		</table>
	</form>
</div>