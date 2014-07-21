<?php 
require_once ("../require/conexion_class.php");

class trabajos {
	private $_conexion;
	
	public function __construct () {
		$this->_conexion = new conexion;
	}
	
	public function crear_trabajo ($nom_trabajo) {
		$sql = "INSERT INTO `trabajos`(`id_trabajo`, `nom_trabajo`, `estado_trabajo`) 
					VALUES (null, '".$nom_trabajo."', '1' )";
		return ($this->_conexion->ejecutar_sentencia($sql));		
	}
	public function desactivar_trabajo ($id_trabajo) {
		$sql = "UPDATE `trabajos` SET estado_trabajo = 0 WHERE id_trabajo='".$id_trabajo."' ";
		return ($this->_conexion->ejecutar_sentencia($sql));
	}
	public function ver_trabajos () {
		$sql = "SELECT * FROM `trabajos` WHERE estado_trabajo = '1' ";
		return ($this->_conexion->ejecutar_sentencia($sql));
	}
	public function retornar_SELECT (){
		return $this->_conexion->retornar_array();
	}
	public function cambiar_nom_trabajo ($id_trabajo, $nom_trabajo){
		$sql = "UPDATE `trabajos` SET `nom_trabajo`='".$nom_trabajo."' WHERE `id_trabajo`= '".$id_trabajo."' ";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function ver_nombre_trabajo ($id_trabajo){
		$sql = "SELECT nom_trabajo,id_trabajo FROM trabajos WHERE id_trabajo ='".$id_trabajo."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$trabajo = $this->_conexion->retornar_array();
		return $trabajo["nom_trabajo"];
	}
}

?>