<?php 
require_once ("../require/conexion_class.php");
require_once ("../require/est_civil_class.php");
require_once ("../require/distrito_class.php");
require_once ("../require/provincia_class.php");
require_once ("../require/region_class.php");
require_once ("../require/categorias_class.php");
require_once ("../require/adm_pension_class.php");
require_once ("../require/nivel_educ_class.php");
require_once ("../require/banco_class.php");
require_once ("../require/grupo_sanguineo_class.php");


class personal {
	private $_conexion;
	private $_datos_trabajador;
	
	public function __construct (){
		$this->_conexion = new conexion();
	}

	public function ver_relacion_personal(){
		$sql = "SELECT personas.*, datos_trabajadores.id_persona FROM personas,datos_trabajadores 
					WHERE personas.id_persona = datos_trabajadores.id_persona AND personas.estado_persona = '1' 
					AND datos_trabajadores.estado_datos ='1' ORDER BY personas.ap_paterno ASC";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	public function retornar_SELECT(){
		return $this->_conexion->retornar_array();
	}
	public function verificar_trabajador ($id_persona) {
		$sql = "SELECT id_persona,id_dato FROM datos_trabajadores WHERE id_persona = '".$id_persona."' 
					AND estado_datos ='1' ";
		$this->_conexion->ejecutar_sentencia($sql);
		return $this->_conexion->tam_respuesta();
	}
	
	public function verificar_trabajador_desactivado ($id_persona) {
		$sql = "SELECT id_persona,id_dato FROM datos_trabajadores WHERE id_persona = '".$id_persona."' 
					AND estado_datos ='0' ";
		$this->_conexion->ejecutar_sentencia($sql);
		return $this->_conexion->tam_respuesta();
	}
	
	private function cambiar_estado_datos ($id_persona, $estado_datos){
		$sql = "UPDATE datos_trabajadores SET estado_datos = '".$estado_datos."' WHERE id_persona ='".$id_persona."'  ";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function activar_trabajador ($id_persona){
		return $this->cambiar_estado_datos($id_persona, 1);
	}
	
	public function desactivar_trabajador ($id_persona){
		return $this->cambiar_estado_datos($id_persona, 0);
	}
	
	public function verificar_registrar ($id_persona){
		if($this->verificar_trabajador($id_persona)){
			$this->_conexion->ejecutar_ultima_sentencia();
			$verificacion = $this->_conexion->retornar_array();
			return $verificacion["id_dato"];
		} elseif ($this->verificar_trabajador_desactivado($id_persona)){
			$this->activar_trabajador($id_persona);
			$this->verificar_registrar($id_persona);
		}else{
			$sql = "INSERT INTO datos_trabajadores (id_dato, id_persona, estado_datos) VALUES (null, '".$id_persona."', 1) ";
			$this->_conexion->ejecutar_sentencia($sql);
			$this->verificar_registrar($id_persona);
		}
	}
	
	public function  ver_datos_trabajador ($id_persona) {
		$sql = "SELECT * FROM personas,datos_trabajadores WHERE datos_trabajadores.id_persona = '".$id_persona."' 
					AND personas.id_persona=datos_trabajadores.id_persona LIMIT 1 ";
		$this->_conexion->ejecutar_sentencia($sql);
		$this->_datos_trabajador = $this->_conexion->retornar_array();
		return $this->_datos_trabajador;
	}
	public function obtener_id_dato ($id_persona){
		$sql = "SELECT id_persona,id_dato FROM datos_trabajadores WHERE id_persona = '".$id_persona."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$dato = $this->_conexion->retornar_array();
		return $dato["id_dato"];
	}

	public function sexo (){
		if($this->_datos_trabajador["sexo"] == "1") {
			return "MASCULINO";
		}elseif($this->_datos_trabajador["sexo"] == "0") {
			return "FEMENINO";
		}else {
			return "";
		}
	}
	public function estado_civil () {
		$estado_civil = new est_civil();
		return $estado_civil->ver_estado_civil($this->_datos_trabajador["id_est_civil"]);
	}
	
	public function distrito () {
		$distrito = new distrito();
		return $distrito->ver_distrito($this->_datos_trabajador["id_distrito"]);
	}

	public function provincia () {
		$provincia = new provincia();
		return $provincia->ver_provincia($this->_datos_trabajador["id_provincia"]);
	}
	
	public function region () {
		$region = new region();
		return $region->ver_region($this->_datos_trabajador["id_region"]);
	}
	
	public function categoria () {
		$categoria = new categorias();
		return $categoria->ver_categoria($this->_datos_trabajador["id_categoria"]);
	}
	
	public function adm_pension () {
		$adm_pension = new adm_pension();
		return $adm_pension->ver_adm_pension($this->_datos_trabajador["id_adm_pension"]);
	}
	
	public function nivel_educ () {
		$nivel_educ = new nivel_educ();
		return $nivel_educ->ver_nivel_educ($this->_datos_trabajador["id_nivel_educ"]);
	}
	
	public function banco_sueldo () {
		$banco_sueldo = new banco();
		return $banco_sueldo->ver_banco($this->_datos_trabajador["id_banco_sueldo"]);
	}
	
	public function grupo_sanguineo () {
		$grupo_sanguineo = new grupo_sanguineo();
		return $grupo_sanguineo->ver_grupo_sanguineo($this->_datos_trabajador["id_grupo_sanguineo"]);
	}
	
	public function ingresar_datos_primarios ($id_persona ,$primer_nombre, $segundo_nombre, $ap_paterno, $ap_materno, $fecha_nac, $edad, $DNI, $sexo){
		$sql = "UPDATE `datos_trabajadores` SET `segundo_nombre`='".$segundo_nombre."',`fecha_nac`='".$fecha_nac."',
				`edad`='".$edad."', `DNI`='".$DNI."',`sexo`='".$sexo."' WHERE id_persona = '".$id_persona."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$sql = "UPDATE personas SET primer_nombre ='".$primer_nombre."', ap_paterno ='".$ap_paterno."', 
					ap_materno ='".$ap_materno."' WHERE  id_persona = '".$id_persona."' ";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function ingresar_datos_secundarios ($id_persona, $num_hijos, $num_escolares, $id_est_civil, $id_grupo_sanguineo, $telefono, $celular, $e_mail){
		$sql = "UPDATE `datos_trabajadores` SET `id_est_civil`='".$id_est_civil."',`id_grupo_sanguineo`='".$id_grupo_sanguineo."',
				`telefono`='".$telefono."',`celular`='".$celular."',`e_mail`='".$e_mail."' WHERE id_persona = '".$id_persona."' ";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function ingresar_datos_vivienda ($id_persona, $id_distrito, $id_provincia, $id_region, $direccion){
		$sql = "UPDATE datos_trabajadores SET id_distrito ='".$id_distrito."', id_provincia ='".$id_provincia."',
					id_region ='".$id_region."', direccion ='".$direccion."' WHERE id_persona ='".$id_persona."' ";
		return $this->_conexion->ejecutar_sentencia($sql);
	}

	public function ingresar_datos_terciarios ($id_persona, $id_adm_pension, $id_nivel_educ, $id_banco_sueldo, $cuenta_sueldo, $num_CUSPP, $id_categoria ){
		$sql = "UPDATE datos_trabajadores SET id_adm_pension ='".$id_adm_pension."', id_nivel_educ ='".$id_nivel_educ."',
					id_banco_sueldo ='".$id_banco_sueldo."', cuenta_sueldo ='".$cuenta_sueldo."', num_CUSPP ='".$num_CUSPP."',
					id_categoria ='".$id_categoria."' WHERE id_persona ='".$id_persona."' ";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function ingresar_alergias ($id_persona, $alergias){
		$sql = "UPDATE datos_trabajadores SET alergias ='".$alergias."' WHERE id_persona ='".$id_persona."' ";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function ingresar_datos_ropa ($id_persona, $talla_botas, $talla_pantalon, $talla_camisa){
		$sql = "UPDATE datos_trabajadores SET talla_botas ='".$talla_botas."', talla_pantalon ='".$talla_pantalon."',
					talla_camisa ='".$talla_camisa."' WHERE id_persona ='".$id_persona."' ";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function ingresar_datos_emergencia ($id_persona, $nom_emergencia, $telf_emergencia){
		$sql = "UPDATE datos_trabajadores SET nom_emergencia ='".$nom_emergencia."', telf_emergencia ='".$telf_emergencia."'
					WHERE id_persona ='".$id_persona."' ";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
}
?>