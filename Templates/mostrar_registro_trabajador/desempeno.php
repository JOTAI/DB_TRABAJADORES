<table width="1000" align="center">
<tr>
	<td id="tabla1_encabezado" width="1000" colspan="3">
		DESEMPENO
	</td>
</tr>
<tr>
	<td id="tabla1_encabezado" width="50" >
		No
	</td>
	<td id="tabla1_encabezado" width="550" >
		Comentario
	</td>
	<td id="tabla1_encabezado" width="400" >
		Reportante
	</td>
</tr>
<?php 
	$desempeno->ver_cuadro_desempeno($id_persona_env);
	$cont_desempeno = 1;
	while($reg_desempeno = $desempeno->retornar_SELECT()) {
?>
<tr>
	<td id="tabla1_informacion" width="50" >
		<?php echo $cont_desempeno;?>
	</td>
	<td id="tabla1_informacion" width="550" >
		<?php echo $reg_desempeno["comentario"];?>
	</td>
	<td id="tabla1_informacion" width="400" >
		<?php 
				echo $persona->ver_nombre_persona($reg_desempeno["id_reportante"]);
		?>
	</td>
</tr>
<?php 
$cont_desempeno++;}
?>
</table>