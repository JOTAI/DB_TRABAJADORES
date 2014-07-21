<table width="1000" align="center">
	<tr>
		<td id="tabla1_encabezado" width="1000" colspan="4">
			EXPERIENCIA LABORAL
		</td>
	</tr>
	<tr>
		<td id="tabla1_encabezado" width="200" >
			Cargo
		</td>
		<td id="tabla1_encabezado" width="400" >
			Proyecto
		</td>
		<td id="tabla1_encabezado" width="200" >
			F. Inicio
		</td>
		<td id="tabla1_encabezado" width="200" >
			F. Final
		</td>
	</tr>
<?php
	$experiencia_laboral->ver_experiencia_laboral($id_persona_env);
	while($reg_experiencia = $experiencia_laboral->retornar_SELECT()) {
?>
	<tr>
		<td id="tabla1_informacion" width="200" >
			<?php echo $categoria->ver_categoria($reg_experiencia["id_categoria"]);?>
		</td>
		<td id="tabla1_informacion" width="400" >
			<?php echo $reg_experiencia["nom_proyecto"];?>
		</td>
		<td id="tabla1_informacion" width="200" >
			<?php echo $reg_experiencia["fecha_inicio"];?>
		</td>
		<td id="tabla1_informacion" width="200" >
			<?php echo $reg_experiencia["fecha_fin"];?>
		</td>
	</tr>
<?php 
}
?>
</table>