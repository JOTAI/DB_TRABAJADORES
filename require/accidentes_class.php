<?php 
require_once ("../require/conexion_class.php");

class accidentes {
	private $_conexion;
	
	public function __construct (){
		$this->_conexion = new conexion;
	}
	
	public function verificar_accidentes ($id_persona){
		$sql = "SELECT * FROM cuadro_desempenos WHERE id_persona ='".$id_persona."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		return $this->_conexion->tam_respuesta();
	}
	
	public function ver_cuadro_accidentes ($id_persona){
		$sql = "SELECT * FROM accidentes,cuadro_accidentes WHERE cuadro_accidentes.id_persona = '".$id_persona."' AND
					accidentes.id_accidente = cuadro_accidentes.id_accidente ";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	
	private function buscar_id_accidente ($accidente, $accion){
		$sql = "SELECT * FROM accidentes WHERE accidente ='".$accidente."' 
					AND accion ='".$accion."' ORDER BY id_accidente DESC LIMIT 1 ";
		$this->_conexion->ejecutar_sentencia($sql);
		$accidente = $this->_conexion->retornar_array();
		echo $accidente["id_accidente"];
		return $accidente["id_accidente"];
	}
	
	private function guardar_accidente ($accidente, $accion ){
		$sql = "INSERT INTO `accidentes`(`id_accidente`, `accidente`, `accion`, `fecha_accid`) 
					VALUES (null , '".$accidente."', '".$accion."', now() )";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	private function guardar_cuadro_accidente ($id_accidente, $id_persona){
		$sql = "INSERT INTO `cuadro_accidentes`(`id_cuadro_accidente`, `id_accidente`, `id_persona`) 
					VALUES (null, '".$id_accidente."', '".$id_persona."') ";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function registrar_accidente ($id_persona, $accidente, $accion){
		$this->guardar_accidente ($accidente, $accion );
		$id_accidente = $this->buscar_id_accidente ($accidente, $accion);
		return $this->guardar_cuadro_accidente ($id_accidente, $id_persona );
	}
	
	public function retornar_SELECT (){
		return $this->_conexion->retornar_array();
	}
	
}

?>