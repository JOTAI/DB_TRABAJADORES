<script type="text/javascript" language="javascript" src="AD_accidentes/ingresar_datos_accidente/ingresar_datos_accidente.js" ></script>
<form action="AD_accidentes_aux.php" method="POST" name="datos_accidente">
	<table width="1000" align="center">
		<tr id="tabla1_encabezado">
			<td width="1000" colspan="2">
				TRABAJADOR
			</td>
		</tr>
		<tr id="tabla1_informacion">
			<td colspan="2">
				<select name="id_persona">
					<option value="" >Elegir Trabajador</option>
					<?php  												
					$personal->ver_relacion_personal();
							while($op_personal = $personal->retornar_SELECT()) {
					?>
					<option value="<?php echo $op_personal['id_persona'];?>">
					<?php echo nombre_persona($op_personal) ;?>
					</option>
					<?php }?>
				</select>
				<div id="div_id_persona" class="dato_incorrecto">
				
				</div>
			</td>
		</tr>
		<tr id="tabla1_encabezado">
			<td width="500">
				Accidente
			</td>
			<td width="500">
				Accion a tomar
			</td>
		</tr>
		<tr id="tabla1_informacion">
			<td>
				<textarea cols="60" rows="2" name="accidente"></textarea>
			</td>
			<td>
				<textarea cols="60" rows="2" name="accion"></textarea>
			</td>
		</tr>
	</table>
	<input type="hidden" name="Enviar_Accidente" value="1" >
	<input type="button" name="Enviar" value="Enviar Accidente" onclick="validar_datos();" >
</form>