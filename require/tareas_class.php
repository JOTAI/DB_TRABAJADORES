<?php 
require_once ("../require/conexion_class.php");

class tareas {
	private $_conexion;
	
	public function __construct () {
		$this->_conexion = new conexion;
	}
	public function crear_tarea ($nom_tarea,$url_tarea) {
		$sql = "SELECT orden FROM `tareas` ORDER BY orden ASC LIMIT 1";
		$this->_conexion->ejecutar_sentencia($sql);
		$retorno = $this->_conexion->retornar_array();
		$ultimo_orden = $retorno["orden"] + 1;
		$sql = "INSERT INTO `tareas`(`id_tarea`, `nom_tarea`, `url_tarea`, `orden`) 
					VALUES (null, '".$nom_tarea."', '".$url_tarea."', '".$ultimo_orden."' )";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	public function ver_tareas (){
		$sql = "SELECT * FROM tareas ORDER BY orden ASC";
		$this->_conexion->ejecutar_sentencia($sql);		
	}
	public function ver_tarea ($id_tarea){
		$sql = "SELECT * FROM tareas WHERE id_tarea = '".$id_tarea."'";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	public function retornar_SELECT(){
		return $this->_conexion->retornar_array();
	}
}

?>