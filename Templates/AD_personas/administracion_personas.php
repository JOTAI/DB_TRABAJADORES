<?php 
if($acceso == 1) {
			require_once ("../require/personal_class.php");
			require_once ("../require/usuarios_class.php");
			require_once ("../require/nombre_persona_func.php");
			$personal = new personal();
			$usuario = new usuarios();
	?>
<table width="800" align="center">
	<tr id="tabla1_encabezado">
		<td width="50">
			No
		</td>
		<td width="50">
			Codigo
		</td>
		<td width="400">
			Nombre y Apellidos
		</td>
		<td width="100">
			Trabajador
		</td>
		<td width="100">
			Usuario
		</td>
		<td width="100">
		</td>
	</tr>
	<?php $persona->ver_personas();
			$cont_personas = 1;
			while($rel_personas = $persona->retornar_SELECT()) {
	  ?>
	<form action="AD_personas_aux.php" method="POST" >
	<tr id="tabla1_informacion">
		<td width="50">
			<?php echo $cont_personas?>
		</td>
		<td width="50">
			<?php echo $rel_personas["id_persona"];  ?>
			<input type="hidden" name="id_persona" value="<?php echo $rel_personas['id_persona'];?>" >
		</td>
		<td width="400">
			<?php echo nombre_persona($rel_personas); ?>
		</td>
		<td width="100">
			<?php if($personal->verificar_trabajador($rel_personas["id_persona"]) ) { ?>
			<input type="submit" name="Quitar_trabajador" value="Quitar">
			<?php } else {?>
			<input type="submit" name="Agregar_trabajador" value="Agregar">
			<?php }?>
		</td>
		<td width="100">
			<?php if($usuario->verificar_usuario($rel_personas["id_persona"]) ) { ?>
			<input type="submit" name="Quitar_usuario" value="Quitar">
			<?php } else {?>
			<input type="submit" name="Agregar_usuario" value="Agregar">
			<?php }?>
		</td>
		<td width="100">
			<input type="submit" name="Editar_persona" value="Editar Datos">
		</td>
	</tr>
	</form>
	<?php $cont_personas++; }?>
	
</table>
<?php 
}
?>