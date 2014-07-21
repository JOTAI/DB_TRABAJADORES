<?php 
require_once ("../require/conexion_class.php");

class provincia {
	private $_conexion;
	
	public function __construct (){
		$this->_conexion = new conexion;
	}
	
	public function ver_provincia ($id_provincia){
		$sql = "SELECT * FROM provincia WHERE id_provincia = '".$id_provincia."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$provincia = $this->_conexion->retornar_array();
		return $provincia["nom_provincia"];
	}
	
	public function nuevo_provincia ($nom_provincia){
		$sql = "INSERT INTO provincia (`id_provincia`, `nom_provincia`) VALUES (null, '".$nom_provincia."')";
		$this->_conexion->ejecutar_sentencia($sql);
		$sql = "SELECT * FROM provincia WHERE nom_provincia ='".$nom_provincia."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$provincia = $this->_conexion->retornar_array();
		return $provincia["id_provincia"];
	}
	
	public function ver_provincias (){
		$sql = "SELECT * FROM provincia";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function retornar_SELECT (){
		return $this->_conexion->retornar_array();
	}
	
}

?>