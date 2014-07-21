<?php 
if($acceso == 1 ) {
	if ($reg_personal = $personal->ver_datos_trabajador($id_persona_env)){
		$est_civil = new est_civil();
		$distrito = new distrito();
		$provincia = new provincia();
		$region = new region();
		$categoria = new categorias();
		$adm_pension = new adm_pension();
		$nivel_educ = new nivel_educ();
		$banco = new banco();
		$grupo_sanguineo = new grupo_sanguineo();
		$cond_trabajo = new cond_trab();
		
?>
		<script type="text/javascript" language="javascript" src="editar_datos/editar_datos_trabajador/editar_datos_trabajador.js" ></script>
		<div id="mensaje_registro_trabajador">
			
		</div>
			<table width="1000" align="center">
				<tr>
					<td id="tabla1_input" width="200" rowspan="7" >
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
				<tr id="tabla1_input">
					<td  width="200">
						<input type="text" name="primer_nombre" value="<?php echo $reg_personal['primer_nombre']?>" >
					</td>
					<td  width="200">
						<input type="text" name="segundo_nombre" value="<?php echo $reg_personal['segundo_nombre']?>" >
					</td>
					<td  width="200">
						<input type="text" name="ap_paterno" value="<?php echo $reg_personal['ap_paterno']?>" >
					</td>
					<td  width="200">
						<input type="text" name="ap_materno" value="<?php echo $reg_personal['ap_materno']?>" >
					</td>
				</tr>
				<tr id="tabla1_encabezado" >
					<td  width="200">
						F. Nacimiento
					</td>
					<td width="200">
						Edad
					</td>
					<td width="200">
						DNI
					</td>
					<td width="200">
						Sexo
					</td>
				</tr>
				<tr id="tabla1_input" >
					<td  width="200">
						<input type="text" name="fecha_nac" value="<?php if($reg_personal['fecha_nac'] != '' ){echo $reg_personal['fecha_nac'];} else {echo '0000-00-00';}?>" >
					</td>
					<td  width="200">
						<input type="text" name="edad" value="<?php echo $reg_personal['edad']?>" >
					</td>
					<td width="200">
						<input type="text" name="DNI" value="<?php echo $reg_personal['DNI']?>" >
					</td>
					<td>
						<select name="sexo">
							<option value="1" <?php if ($reg_personal['sexo']=="1"){echo "selected";}?> >MASCULINO</option>
							<option value="0" <?php if ($reg_personal['sexo']=="0"){echo "selected";}?> >FEMENINO</option>
							<option value="" <?php if ($reg_personal['sexo']==""){echo "selected";}?> >vacio</option>
						</select>
					</td>
				</tr>
				<tr id="tabla1_encabezado" >
					<td  width="200">
						# Hijos
					</td>
					<td width="200">
						# de Escolares
					</td>
					<td width="200">
						Estado Civil
					</td>
					<td width="200">
						Grupo sanguineo
					</td>
				</tr>
				<tr id="tabla1_input" >
					<td width="200">
						<input type="text" name="num_hijos" value="<?php echo $reg_personal['num_hijos']?>" >
					</td>
					<td width="200">
						<input type="text" name="num_escolares" value="<?php echo $reg_personal['num_escolares']?>" >
					</td>
					<td width="200">
						<select name="id_est_civil" id="id_est_civil" onchange="eval_select('id_est_civil','otro_est_civil')">
							<?php $est_civil->ver_estados();
							while($op_est_civil = $est_civil->retornar_SELECT() ) { ?>
							<option value="<?php echo $op_est_civil['id_est_civil'];?>" 
								<?php if ($op_est_civil['id_est_civil'] == $reg_personal['id_est_civil']){echo "selected";}?> 
							><?php echo $op_est_civil['nom_est'];?></option>
							<?php }?>
							<option value="otro">Otro</option>
							<option value="" <?php if ($reg_personal['id_est_civil']=="" or $reg_personal['id_est_civil']=="0"){echo "selected";}?> >Vacio</option>
						</select>
						<input type="hidden" name="otro_est_civil" id="otro_est_civil">
					</td>
					<td width="200">
						<select name="id_grupo_sanguineo" id="id_grupo_sanguineo" onchange="eval_select('id_grupo_sanguineo','otro_grupo_sanguineo')">
							<?php 
							$grupo_sanguineo->ver_grupos_sanguineos();
							while($op_grupo_sanguineo = $grupo_sanguineo->retornar_SELECT() ) { ?>
							<option value="<?php echo $op_grupo_sanguineo['id_grupo_sanguineo'];?>" 
								<?php if ($op_grupo_sanguineo['id_grupo_sanguineo'] == $reg_personal['id_grupo_sanguineo']){echo "selected";}?> 
							><?php echo $op_grupo_sanguineo['nom_grupo'];?></option>
							<?php }?>
							<option value="otro">Otro</option>
							<option value="" <?php if ($reg_personal['id_grupo_sanguineo']=="" or $reg_personal['id_grupo_sanguineo']=="0"){echo "selected";}?> >Vacio</option>
						</select>
						<input type="hidden" name="otro_grupo_sanguineo" id="otro_grupo_sanguineo">
					</td>
				</tr>
				<tr id="tabla1_encabezado" >
					<td width="200">
						Codigo
					</td>
					<td width="200">
						Telefono
					</td>
					<td width="200">
						Celular
					</td>
					<td width="400" colspan="2">
						E-mail
					</td>
				</tr>
				<tr id="tabla1_input" >
					<td width="200">
						<?php echo $reg_personal["id_persona"]?>
					</td>
					<td width="200">
						<input type="text" name="telefono" value="<?php echo $reg_personal['telefono']?>" >
					</td>
					<td width="200">
						<input type="text" name="celular" value="<?php echo $reg_personal['celular']?>" >
					</td>
					<td width="400" colspan="2">
						<input type="text" name="e_mail" value="<?php echo $reg_personal['e_mail']?>" style="width:400px" >
					</td>
				</tr>
				<tr id="tabla1_encabezado" >
					<td width="200">
						Distrito
					</td>
					<td width="200">
						Provincia
					</td>
					<td width="200">
						Region
					</td>
					<td width="400" colspan="2">
						Direccion
					</td>
				</tr>
				<tr id="tabla1_input" >
					<td width="200">
						<select name="id_distrito" id="id_distrito" onchange="eval_select('id_distrito','otro_distrito')">
							<?php 
							$distrito->ver_distritos();
							while($op_distrito = $distrito->retornar_SELECT() ) { ?>
							<option value="<?php echo $op_distrito['id_distrito'];?>" 
								<?php if ($op_distrito['id_distrito'] == $reg_personal['id_distrito']){echo "selected";}?> 
							><?php echo $op_distrito['nom_distrito'];?></option>
							<?php }?>
							<option value="otro">Otro</option>
							<option value="" <?php if ($reg_personal['id_distrito']==""){echo "selected";}?> >Vacio</option>
						</select>
						<input type="hidden" name="otro_distrito" id="otro_distrito">
					</td>
					<td width="200">
						<select name="id_provincia" id="id_provincia" onchange="eval_select('id_provincia','otro_provincia')">
							<?php 
							$provincia->ver_provincias();
							while($op_provincia = $provincia->retornar_SELECT() ) { ?>
							<option value="<?php echo $op_provincia['id_provincia'];?>" 
								<?php if ($op_provincia['id_provincia'] == $reg_personal['id_provincia']){echo "selected";}?> 
							><?php echo $op_provincia['nom_provincia'];?></option>
							<?php }?>
							<option value="otro">Otro</option>
							<option value="" <?php if ($reg_personal['id_provincia']=="" or $reg_personal['id_provincia']=="0"){echo "selected";}?> >Vacio</option>
						</select>
						<input type="hidden" name="otro_provincia" id="otro_provincia">
					</td>
					<td width="200">
						<select name="id_region" id="id_region" onchange="eval_select('id_region','otro_region')">
							<?php 
							$region->ver_regiones();
							while($op_region = $region->retornar_SELECT() ) { ?>
							<option value="<?php echo $op_region['id_region'];?>" 
								<?php if ($op_region['id_region'] == $reg_personal['id_region']){echo "selected";}?> 
							><?php echo $op_region['nom_region'];?></option>
							<?php }?>
							<option value="otro">Otro</option>
							<option value="" <?php if ($reg_personal['id_region']=="" or $reg_personal['id_region']=="0"){echo "selected";}?> >Vacio</option>
						</select>
						<input type="hidden" name="otro_region" id="otro_region">
					</td>
					<td width="400" colspan="2">
						<input type="text" name="direccion" value="<?php echo $reg_personal['direccion']?>" style="width:400px" >
					</td>
				</tr>
				<tr id="tabla1_encabezado" >
					<td width="200">
						Adm. Pensiones
					</td>
					<td width="200">
						Nivel Educacion
					</td>
					<td width="200">
						Banco Sueldo
					</td>
					<td width="400" colspan="2">
						Cuenta Sueldo
					</td>
				</tr>
				<tr id="tabla1_input" >
					<td width="200">
						<select name="id_adm_pension" id="id_adm_pension" onchange="eval_select('id_adm_pension','otro_adm_pension')">
							<?php 
							$adm_pension->ver_adm_pensiones();
							while($op_adm_pension = $adm_pension->retornar_SELECT() ) { ?>
							<option value="<?php echo $op_adm_pension['id_adm_pension'];?>" 
								<?php if ($op_adm_pension['id_adm_pension'] == $reg_personal['id_adm_pension']){echo "selected";}?> 
							><?php echo $op_adm_pension['nom_pension'];?></option>
							<?php }?>
							<option value="otro">Otro</option>
							<option value="" <?php if ($reg_personal['id_adm_pension']=="" or $reg_personal['id_adm_pension']=="0"){echo "selected";}?> >Vacio</option>
						</select>
						<input type="hidden" name="otro_adm_pension" id="otro_adm_pension">
					</td>
					<td width="200">
						<select name="id_nivel_educ" id="id_nivel_educ" onchange="eval_select('id_nivel_educ','otro_nivel_educ')">
							<?php 
							$nivel_educ->ver_niveles_educ();
							while($op_nivel_educ = $nivel_educ->retornar_SELECT() ) { ?>
							<option value="<?php echo $op_nivel_educ['id_nivel_educ'];?>" 
								<?php if ($op_nivel_educ['id_nivel_educ'] == $reg_personal['id_nivel_educ']){echo "selected";}?> 
							><?php echo $op_nivel_educ['nom_nivel_educ'];?></option>
							<?php }?>
							<option value="otro">Otro</option>
							<option value="" <?php if ($reg_personal['id_nivel_educ']=="" or $reg_personal['id_nivel_educ']=="0"){echo "selected";}?> >Vacio</option>
						</select>
						<input type="hidden" name="otro_nivel_educ" id="otro_nivel_educ">
					</td>
					<td width="200">
						<select name="id_banco_sueldo" id="id_banco_sueldo" onchange="eval_select('id_banco_sueldo','otro_banco_sueldo')">
							<?php 
							$banco->ver_bancos();
							while($op_banco_sueldo = $banco->retornar_SELECT() ) { ?>
							<option value="<?php echo $op_banco_sueldo['id_banco'];?>" 
								<?php if ($op_banco_sueldo['id_banco'] == $reg_personal['id_banco_sueldo']){echo "selected";}?> 
							><?php echo $op_banco_sueldo['nom_banco'];?></option>
							<?php }?>
							<option value="otro">Otro</option>
							<option value="" <?php if ($reg_personal['id_banco_sueldo']=="" or $reg_personal['id_banco_sueldo']=="0"){echo "selected";}?> >Vacio</option>
						</select>
						<input type="hidden" name="otro_banco_sueldo" id="otro_banco_sueldo">
					</td>
					<td width="400" colspan="2">
						<input type="text" name="cuenta_sueldo" value="<?php echo $reg_personal['cuenta_sueldo']?>" style="width:400px">
					</td>
				</tr>
				<tr id="tabla1_encabezado" >
					<td width="200">
						No CUSPP
					</td>
					<td width="200">
						Categoria
					</td>
					<td width="600" colspan="3">
						Alergias
					</td>
				</tr>
				<tr id="tabla1_input" >
					<td width="200">
						<input type="text" name="num_CUSPP" value="<?php echo $reg_personal['num_CUSPP']?>" >
					</td>
					<td width="200">
						<select name="id_categoria" id="id_categoria" onchange="eval_select('id_categoria','otro_categoria')">
							<?php 
							$categoria->ver_categorias();
							while($op_categoria = $categoria->retornar_SELECT() ) { ?>
							<option value="<?php echo $op_categoria['id_categoria'];?>" 
								<?php if ($op_categoria['id_categoria'] == $reg_personal['id_categoria']){echo "selected";}?> 
							><?php echo $op_categoria['nom_categoria'];?></option>
							<?php }?>
							<option value="otro">Otro</option>
							<option value="" <?php if ($reg_personal['id_categoria']=="" or $reg_personal['id_categoria']=="0"){echo "selected";}?> >Vacio</option>
						</select>
						<input type="hidden" name="otro_categoria" id="otro_categoria">
					</td>
					<td width="600" colspan="3">
						<input type="text" name="alergias" value="<?php echo $reg_personal['alergias']?>" style="width:600px" >
					</td>
				</tr>
				<tr id="tabla1_encabezado" >
					<td width="200">
						Talla botas
					</td>
					<td width="200">
						Talla Pantalon
					</td>
					<td width="200">
						Talla Camisa
					</td>
					<td width="200" >
						Fecha Ingreso
					</td>
					<td width="200" >
						Fecha Cese
					</td>
				</tr>
				<tr id="tabla1_input" >
					<td width="200">
						<input type="text" name="talla_botas" value="<?php echo $reg_personal['talla_botas']?>" >
					</td>
					<td width="200">
						<input type="text" name="talla_pantalon" value="<?php echo $reg_personal['talla_pantalon']?>" >
					</td>
					<td width="200">
						<input type="text" name="talla_camisa" value="<?php echo $reg_personal['talla_camisa']?>" >
					</td>
					<td width="200" >
						<?php echo $cond_trabajo->ver_fecha_condicion($reg_personal['id_persona'],1); ?>
					</td>
					<td width="200" >
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
					<td id="tabla1_input" width="400">
						<input type="text" name="nom_emergencia" value="<?php echo $reg_personal['nom_emergencia']?>" style="width:400px" >
					</td>
					<td id="tabla1_encabezado" width="200">
					Telefono
					</td>
					<td id="tabla1_input" width="200">
						<input type="text" name="telf_emergencia" value="<?php echo $reg_personal['telf_emergencia']?>" >
					</td>
				</tr>
			</table>
			<br>
			<div id="subtitulo1">
			<input type="submit" value="ENVIAR DATOS GENERALES" name="enviar">
			</div>
<?php
	}
}
?>