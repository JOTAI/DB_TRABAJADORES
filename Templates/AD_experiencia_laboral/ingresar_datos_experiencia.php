<script type="text/javascript" language="javascript" src="AD_experiencia_laboral/ingresar_datos_experiencia/ingresar_datos_experiencia.js" ></script>
<form action="AD_experiencia_laboral_aux.php" method="POST" name="datos_experiencia_laboral">
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
				categoria
			</td>
			<td width="400">
				Nombre del Proyecto
			</td>
			<td id="200">
				Fecha Inicio
			</td>
			<td id="200">
				Fecha Fin
			</td>
		</tr>
		<tr id="tabla1_input">
			<td width="200">
				<select name="id_categoria" id="id_categoria" onchange="eval_select('id_categoria','otro_categoria')">
					<option value="" >Ingrese categoria</option>
					<?php $categoria->ver_categorias();
					while($op_categoria = $categoria->retornar_SELECT() ) { ?>
					<option value="<?php echo $op_categoria['id_categoria'];?>">
					<?php echo $op_categoria['nom_categoria'];?></option>
					<?php }?>
					<option value="otro">Otro</option>
				</select>
				<input type="hidden" name="otro_categoria" id="otro_categoria">
				<div id="div_id_categoria" class="dato_incorrecto">
				
				</div>
			</td>
			<td width="400">
				<input type="text" name="nom_proyecto" style="width:400px">
			</td>
			<td id="200">
				<input type="text" name="fecha_inicio" value="0000-00-00">
			</td>
			<td id="200">
				<input type="text" name="fecha_fin" value="0000-00-00">
			</td>
		</tr>
	</table>
	<input type="hidden" name="Enviar_Experiencia" value="1" >
	<input type="button" name="Enviar" value="Enviar Experiencia" onclick="validar_datos();" >
</form>