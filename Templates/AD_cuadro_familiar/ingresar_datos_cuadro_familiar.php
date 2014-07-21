<script type="text/javascript" language="javascript" src="AD_cuadro_familiar/ingresar_datos_cuadro_familiar/ingresar_datos_cuadro_familiar.js" ></script>
<form action="AD_cuadro_familiar_aux.php" method="POST" name="datos_cuadro_familiar">
	<table width="1000" align="center">
		<tr id="tabla1_encabezado">
			<td colspan="4" >
				TRABAJADOR
			</td>
		</tr>
		<tr id="tabla1_informacion">
			<td colspan="4" >
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
			<td width="200">
				Parentesco
			</td>
			<td width="400">
				Nombres y Apellidos
			</td>
			<td id="200">
				F. Nacimiento
			</td>
			<td id="200">
				DNI
			</td>
		</tr>
		<tr id="tabla1_input">
			<td width="200">
				<select name="id_parentesco" id="id_parentesco" onchange="eval_select('id_parentesco','otro_parentesco')">
					<option value="" >Ingrese Parentesco</option>
					<?php $parentesco->ver_parentescos();
					while($op_parentesco = $parentesco->retornar_SELECT() ) { ?>
					<option value="<?php echo $op_parentesco['id_parentesco'];?>">
					<?php echo $op_parentesco['nom_parentesco'];?></option>
					<?php }?>
					<option value="otro">Otro</option>
				</select>
				<input type="hidden" name="otro_parentesco" id="otro_parentesco">
				<div id="div_id_parentesco" class="dato_incorrecto">
				
				</div>
			</td>
			<td width="400">
				<input type="text" name="familiar" style="width:400px">
			</td>
			<td id="200">
				<input type="text" name="fecha_nac" value="0000-00-00">
			</td>
			<td id="200">
				<input type="text" name="DNI">
			</td>
		</tr>
	</table>
	<input type="hidden" name="Enviar_Familiar" value="1" >
	<input type="button" name="Enviar" value="Enviar Familiar" onclick="validar_datos();" >
</form>