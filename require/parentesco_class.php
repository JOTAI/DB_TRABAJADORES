<?php 
require_once ("../require/conexion_class.php");

class parentesco {
	private $_conexion;
	
	public function __construct (){
		$this->_conexion = new conexion;
	}
	
	public function ver_parentesco ($id_parentesco){
		$sql = "SELECT * FROM parentesco WHERE id_parentesco = '".$id_parentesco."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$parentesco = $this->_conexion->retornar_array();
		return $parentesco["nom_parentesco"];
	}
	
	public function nuevo_parentesco ($nom_parentesco){
		$sql = "INSERT INTO parentesco (`id_parentesco`, `nom_parentesco`) VALUES (null, '".$nom_parentesco."')";
		$this->_conexion->ejecutar_sentencia($sql);
		$sql = "SELECT * FROM parentesco WHERE nom_parentesco ='".$nom_parentesco."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$parentesco = $this->_conexion->retornar_array();
		return $parentesco["id_parentesco"];
	}
	
	public function ver_parentescos (){
		$sql = "SELECT * FROM parentesco";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function retornar_SELECT (){
		return $this->_conexion->retornar_array();
	}
	
}

?>