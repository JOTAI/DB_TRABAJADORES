<?php 
require_once ("../require/conexion_class.php");
require_once ("../require/nombre_persona_func.php");

class personas {
	private $_conexion;
	private $_id_persona;
	private $_persona;
	
	public function __construct (){
		$this->_conexion = new conexion;
	}

	public function establecer_persona ($id_persona){
		$sql = "SELECT * FROM personas WHERE id_persona='".$id_persona."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$this->_persona = $this->_conexion->retornar_array();
	} 	
	
	public function retornar_id_trabajo (){
		return $this->_persona["id_trabajo"];
	}
	public function foto() {
		echo $this->_persona["foto"];
	}
	public function ver_personas () {
		$sql = "SELECT * FROM personas WHERE estado_persona = '1' ";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	public function retornar_SELECT(){
		return $this->_conexion->retornar_array();
	}
	public function cambiar_trabajo ($id_persona, $id_trabajo){
		$sql = "UPDATE personas SET id_trabajo='".$id_trabajo."' WHERE id_persona= '".$id_persona."' ";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function registrar_persona ($primer_nombre, $ap_paterno, $ap_materno, $id_trabajo){
		$sql = "INSERT INTO personas (`id_persona`, `id_trabajo`, `primer_nombre`, `ap_paterno`, `ap_materno`, `estado_persona`) 
					VALUES (null, '".$id_trabajo."', '".$primer_nombre."', '".$ap_paterno."', '1')";
		$this->_conexion->ejecutar_sentencia($sql);
		$sql = "SELECT * FROM personas WHERE id_trabajo = '".$id_trabajo."' AND primer_nombre = '".$primer_nombre."'
					AND ap_paterno = '".$ap_paterno."' AND ap_materno = '".$ap_materno."' AND estado_persona = '1' 
					ORDER BY id_persona ASC LIMIT 1 ";
		$this->_conexion->ejecutar_sentencia($sql);
		$registrado = $this->_conexion->retornar_array();
		return $registrado["id_persona"];
	}
	
	public function verificar_persona ($id_persona){
		$sql = "SELECT id_persona,estado_persona FROM personas WHERE id_persona = '".$id_persona."' AND estado_persona ='1' ";
		$this->_conexion->ejecutar_sentencia($sql);
		return $this->_conexion->tam_respuesta();
	}
	
	public function ver_datos_persona ($id_persona){
		$sql = "SELECT * FROM personas WHERE id_persona ='".$id_persona."' LIMIT 1";
		$this->_conexion->ejecutar_sentencia($sql);
		return $this->_conexion->retornar_array(); 
	}
	public function ver_nombre_persona ($id_persona){
		$datos_persona = $this->ver_datos_persona($id_persona);
		return nombre_persona($datos_persona);
	}
}

?>