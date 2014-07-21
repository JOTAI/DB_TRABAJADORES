<?php 
require_once ("../require/conexion_class.php");

class nivel_educ {
	private $_conexion;
	
	public function __construct (){
		$this->_conexion = new conexion;
	}
	
	public function ver_nivel_educ ($id_nivel_educ){
		$sql = "SELECT * FROM nivel_educ WHERE id_nivel_educ = '".$id_nivel_educ."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$nivel_educ = $this->_conexion->retornar_array();
		return $nivel_educ["nom_nivel_educ"];
	}
	
	public function nuevo_nivel_educ ($nom_nivel_educ){
		$sql = "INSERT INTO nivel_educ (`id_nivel_educ`, `nom_nivel_educ`) VALUES (null, '".$nom_nivel_educ."')";
		$this->_conexion->ejecutar_sentencia($sql);
		$sql = "SELECT * FROM nivel_educ WHERE nom_nivel_educ ='".$nom_nivel_educ."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$nivel_educ = $this->_conexion->retornar_array();
		return $nivel_educ["id_nivel_educ"];
	}
	
	public function ver_niveles_educ (){
		$sql = "SELECT * FROM nivel_educ";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function retornar_SELECT (){
		return $this->_conexion->retornar_array();
	}
	
}

?>