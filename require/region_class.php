<?php 
require_once ("../require/conexion_class.php");

class region {
	private $_conexion;
	
	public function __construct (){
		$this->_conexion = new conexion;
	}
	
	public function ver_region ($id_region){
		$sql = "SELECT * FROM region WHERE id_region = '".$id_region."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$region = $this->_conexion->retornar_array();
		return $region["nom_region"];
	}
	
	public function nuevo_region ($nom_region){
		$sql = "INSERT INTO region (`id_region`, `nom_region`) VALUES (null, '".$nom_region."')";
		$this->_conexion->ejecutar_sentencia($sql);
		$sql = "SELECT * FROM region WHERE nom_region ='".$nom_region."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$region = $this->_conexion->retornar_array();
		return $region["id_region"];
	}
	
	public function ver_regiones (){
		$sql = "SELECT * FROM region";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function retornar_SELECT (){
		return $this->_conexion->retornar_array();
	}
	
}

?>