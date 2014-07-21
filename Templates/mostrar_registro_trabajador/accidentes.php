<table width="1000" align="center">
<tr>
	<td id="tabla1_encabezado" width="1000" colspan="3">
		ACCIDENTES
	</td>
</tr>
<tr>
	<td id="tabla1_encabezado" width="50" >
		No
	</td>
	<td id="tabla1_encabezado" width="500" >
		Accidente
	</td>
	<td id="tabla1_encabezado" width="450" >
		Accion a tomar
	</td>
</tr>
<?php 
	$accidente->ver_cuadro_accidentes($id_persona_env);
	$cont_accidente = 1;
	while($reg_accidente = $accidente->retornar_SELECT()) { 
?>
<tr>
	<td id="tabla1_informacion" width="50" >
		<?php echo $cont_accidente; ?>
	</td>
	<td id="tabla1_informacion" width="500" >
		<?php echo $reg_accidente["accidente"]; ?>
	</td>
	<td id="tabla1_informacion" width="450" >
		<?php echo $reg_accidente["accion"]; ?>
	</td>
</tr>
<?php
	$cont_accidente++;}
?>
</table>