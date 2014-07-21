<?php 	
if($acceso == 1) {
		require_once ("../require/personal_class.php");
		require_once ("../require/cond_trab_class.php");
		require_once ("../require/nombre_persona_func.php");
		$personal = new personal();
		$cond_trab = new cond_trab();
	?>
<table width="800" align="center">
	<tr id="tabla1_encabezado">
		<td>
			No
		</td>
		<td>
			Codigo
		</td>
		<td>
			Apellidos y Nombre
		</td>
		<td>
		</td>
	</tr>
	<?php $personal->ver_relacion_personal();
			$cont_personal = 1; 
		while($rel_personal = $personal->retornar_SELECT() ) {
	?>
	<tr id="tabla1_informacion">
		<td>
			<?php echo $cont_personal;?>
		</td>
		<td>
			<?php echo $rel_personal["id_persona"]; ?>
		</td>
		<td>
			<?php echo nombre_persona($rel_personal); ?>
		</td>
		<form method="POST" action="AD_trabajadores_aux.php" name="ficha<?php echo $rel_personal['id_persona'];?>" >
		<td>
			<input type="hidden" value="<?php echo $rel_personal['id_persona'];?>" name="id_persona">
			<?php if($cond_trab->ver_ultima_condicion($rel_personal["id_persona"]) == 1) {?>
			<input type="submit" value="Cesar" name="Cesar">
			<?php }elseif($cond_trab->ver_ultima_condicion($rel_personal["id_persona"]) == 2) {?>
			<input type="submit" value="Ingresar" name="Ingresar">
			<?php }?>
		</td>
		</form>
	</tr>
	<?php $cont_personal++; }?>
</table>
<?php 
}
?>