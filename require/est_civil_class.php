<?php 
require_once ("../require/conexion_class.php");

class est_civil {
	private $_conexion;
	
	public function __construct (){
		$this->_conexion = new conexion;
	}
	
	public function ver_estado_civil ($id_est_civil){
		$sql = "SELECT * FROM est_civil WHERE id_est_civil = '".$id_est_civil."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$est_civil = $this->_conexion->retornar_array();
		return $est_civil["nom_est"];
	}
	
	public function nuevo_estado_civil ($nom_est){
		$sql = "INSERT INTO `est_civil`(`id_est_civil`, `nom_est`) VALUES (null, '".$nom_est."')";
		$this->_conexion->ejecutar_sentencia($sql);
		$sql = "SELECT * FROM est_civil WHERE nom_est ='".$nom_est."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$est_civil = $this->_conexion->retornar_array();
		return $est_civil["id_est_civil"];
	}	
	
	public function ver_estados (){
		$sql = "SELECT * FROM est_civil";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function retornar_SELECT (){
		return $this->_conexion->retornar_array();
	}
	
}

?>