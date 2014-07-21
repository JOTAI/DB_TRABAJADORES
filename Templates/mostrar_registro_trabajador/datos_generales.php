<table width="1000" align="center">
	<tr>
		<td id="tabla1_informacion" width="200" rowspan="7" >
		</td>
		<td id="tabla1_encabezado" width="800" colspan="4">
			DATOS GENERALES
		</td>
	</tr>
	<tr>
		<td id="tabla1_encabezado" width="200">
			Primer Nombre
		</td>
		<td id="tabla1_encabezado" width="200">
			Segundo Nombre
		</td>
		<td id="tabla1_encabezado" width="200">
			Apellido Paterno
		</td>
		<td id="tabla1_encabezado" width="200">
			Apellido Materno
		</td>
	</tr>
	<tr>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["primer_nombre"]?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["segundo_nombre"]?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["ap_paterno"]?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["ap_materno"]?>
		</td>
	</tr>
	<tr>
		<td id="tabla1_encabezado" width="200">
			F. Nacimiento
		</td>
		<td id="tabla1_encabezado" width="200">
			Edad
		</td>
		<td id="tabla1_encabezado" width="200">
			DNI
		</td>
		<td id="tabla1_encabezado" width="200">
			Sexo
		</td>
	</tr>
	<tr>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["fecha_nac"]?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["edad"]?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["DNI"]?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $personal->sexo(); ?>
		</td>
	</tr>
	<tr>
		<td id="tabla1_encabezado" width="200">
			# Hijos
		</td>
		<td id="tabla1_encabezado" width="200">
			# de Escolares
		</td>
		<td id="tabla1_encabezado" width="200">
			Estado Civil
		</td>
		<td id="tabla1_encabezado" width="200">
			Grupo sanguineo
		</td>
	</tr>
	<tr>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["num_hijos"]?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["num_escolares"]?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $personal->estado_civil(); ?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $personal->grupo_sanguineo(); ?>
		</td>
	</tr>
	<tr>
		<td id="tabla1_encabezado" width="200">
			Codigo
		</td>
		<td id="tabla1_encabezado" width="200">
			Telefono
		</td>
		<td id="tabla1_encabezado" width="200">
			Celular
		</td>
		<td id="tabla1_encabezado" width="400" colspan="2">
			E-mail
		</td>
	</tr>
	<tr>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["id_persona"]?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["telefono"]?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["celular"]?>
		</td>
		<td id="tabla1_informacion" width="400" colspan="2">
			<?php echo $reg_personal["e_mail"]?>
		</td>
	</tr>
	<tr>
		<td id="tabla1_encabezado" width="200">
			Distrito
		</td>
		<td id="tabla1_encabezado" width="200">
			Provincia
		</td>
		<td id="tabla1_encabezado" width="200">
			Region
		</td>
		<td id="tabla1_encabezado" width="400" colspan="2">
			Direccion
		</td>
	</tr>
	<tr>
		<td id="tabla1_informacion" width="200">
			<?php echo $personal->distrito(); ?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $personal->provincia(); ?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $personal->region(); ?>
		</td>
		<td id="tabla1_informacion" width="400" colspan="2">
			<?php echo $reg_personal["direccion"]?>
		</td>
	</tr>
	<tr>
		<td id="tabla1_encabezado" width="200">
			Adm. Pensiones
		</td>
		<td id="tabla1_encabezado" width="200">
			Nivel Educacion
		</td>
		<td id="tabla1_encabezado" width="200">
			Banco Sueldo
		</td>
		<td id="tabla1_encabezado" width="400" colspan="2">
			Cuenta Sueldo
		</td>
	</tr>
	<tr>
		<td id="tabla1_informacion" width="200">
			<?php echo $personal->adm_pension();?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $personal->nivel_educ(); ?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $personal->banco_sueldo(); ?>
		</td>
		<td id="tabla1_informacion" width="400" colspan="2">
			<?php echo $reg_personal["cuenta_sueldo"]?>
		</td>
	</tr>
	<tr>
		<td id="tabla1_encabezado" width="200">
			No CUSPP
		</td>
		<td id="tabla1_encabezado" width="200">
			Categoria
		</td>
		<td id="tabla1_encabezado" width="600" colspan="3">
			Alergias
		</td>
	</tr>
	<tr>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["num_CUSPP"]?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $personal->categoria(); ?>
		</td>
		<td id="tabla1_informacion" width="600" colspan="3">
			<?php echo $reg_personal["alergias"]?>
		</td>
	</tr>
	<tr>
		<td id="tabla1_encabezado" width="200">
			Talla botas
		</td>
		<td id="tabla1_encabezado" width="200">
			Talla Pantalon
		</td>
		<td id="tabla1_encabezado" width="200">
			Talla Camisa
		</td>
		<td id="tabla1_encabezado" width="200" >
			Fecha Ingreso
		</td>
		<td id="tabla1_encabezado" width="200" >
			Fecha Cese
		</td>
	</tr>
	<tr>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["talla_botas"]?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["talla_pantalon"]?>
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["talla_camisa"]?>
		</td>
		<td id="tabla1_informacion" width="200" >
			<?php echo $cond_trabajo->ver_fecha_condicion($reg_personal['id_persona'],1); ?>
		</td>
		<td id="tabla1_informacion" width="200" >
			<?php echo $cond_trabajo->ver_fecha_condicion($reg_personal['id_persona'],2); ?>
		</td>
	</tr>
</table>
<br>
<table width="1000" align="center">
	<tr>
		<td id="tabla1_encabezado" width="1000" colspan="4">
			Caso de emergencia llamar a
		</td>
	</tr>
	<tr>
		<td id="tabla1_encabezado" width="200"> 
			Nombre
		</td>
		<td id="tabla1_informacion" width="400">
			<?php echo $reg_personal["nom_emergencia"]?>
		</td>
		<td id="tabla1_encabezado" width="200">
		Telefono
		</td>
		<td id="tabla1_informacion" width="200">
			<?php echo $reg_personal["telf_emergencia"]?>
		</td>
	</tr>
</table>