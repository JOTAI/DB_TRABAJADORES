<script type="text/javascript" language="javascript" src="AD_desempeno/ingresar_datos_desempeno/ingresar_datos_desempeno.js" ></script>
<form action="AD_desempeno_aux.php" method="POST" name="datos_desempeno">
	<table width="800" align="center">
		<tr id="tabla1_encabezado">
			<td width="800">
				TRABAJADOR
			</td>
		</tr>
		<tr id="tabla1_informacion">
			<td>
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
			<td>
				Comentario
			</td>
		</tr>
		<tr id="tabla1_informacion">
			<td>
				<textarea cols="110" rows="2" name="comentario"></textarea>
				<div id="div_comentario" class="dato_incorrecto">
				
				</div>
			</td>
		</tr>
	</table>
	<input type="hidden" name="Enviar_Desempeno" value="1" >
	<input type="button" name="Enviar" value="Enviar Desempeno" onclick="validar_datos();" >
</form>