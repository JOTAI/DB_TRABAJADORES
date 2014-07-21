<?php 
require_once ("../require/conexion_class.php");

class banco {
	private $_conexion;
	
	public function __construct (){
		$this->_conexion = new conexion;
	}
	
	public function ver_banco ($id_banco){
		$sql = "SELECT * FROM banco WHERE id_banco = '".$id_banco."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$banco = $this->_conexion->retornar_array();
		return $banco["nom_banco"];
	}
	
	public function nuevo_banco ($nom_banco){
		$sql = "INSERT INTO banco (`id_banco`, `nom_banco`) VALUES (null, '".$nom_banco."')";
		$this->_conexion->ejecutar_sentencia($sql);
		$sql = "SELECT * FROM banco WHERE nom_banco ='".$nom_banco."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$banco = $this->_conexion->retornar_array();
		return $banco["id_banco"];
	}
	
	public function ver_bancos (){
		$sql = "SELECT * FROM banco";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function retornar_SELECT (){
		return $this->_conexion->retornar_array();
	}
	
}

?>