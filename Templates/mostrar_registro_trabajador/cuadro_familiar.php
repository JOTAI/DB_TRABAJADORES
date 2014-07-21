<table width="1000" align="center">
	<tr>
		<td id="tabla1_encabezado" width="1000" colspan="4">
			CUADRO FAMILIAR
		</td>
	</tr>
	<tr>
		<td id="tabla1_encabezado" width="200" >
			Parentesco
		</td>
		<td id="tabla1_encabezado" width="400" >
			Nombre y Apellido
		</td>
		<td id="tabla1_encabezado" width="200" >
			F. Nacimiento
		</td>
		<td id="tabla1_encabezado" width="200" >
			DNI
		</td>
	</tr>
<?php
	$cuadro_familiar->ver_cuadro_familiar($id_persona_env);
	while($reg_familiar = $cuadro_familiar->retornar_SELECT()) {
?>
	<tr>
		<td id="tabla1_informacion" width="200" >
			<?php echo $parentesco->ver_parentesco($reg_familiar["id_parentesco"]);?>
		</td>
		<td id="tabla1_informacion" width="400" >
			<?php echo $reg_familiar["familiar"]; ?>
		</td>
		<td id="tabla1_informacion" width="200" >
			<?php echo $reg_familiar["fecha_nac"]?>
		</td>
		<td id="tabla1_informacion" width="200" >
			<?php echo $reg_familiar["DNI"]; ?>
		</td>
	</tr>
<?php 
	}
?>
</table>