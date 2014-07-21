<?php 
require_once ("../require/conexion_class.php");

class distrito {
	private $_conexion;
	
	public function __construct (){
		$this->_conexion = new conexion;
	}
	
	public function ver_distrito ($id_distrito){
		$sql = "SELECT * FROM distrito WHERE id_distrito = '".$id_distrito."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$distrito = $this->_conexion->retornar_array();
		return $distrito["nom_distrito"];
	}
	
	public function nuevo_distrito ($nom_distrito){
		$sql = "INSERT INTO distrito (`id_distrito`, `nom_distrito`) VALUES (null, '".$nom_distrito."')";
		$this->_conexion->ejecutar_sentencia($sql);
		$sql = "SELECT * FROM distrito WHERE nom_distrito ='".$nom_distrito."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$distrito = $this->_conexion->retornar_array();
		return $distrito["id_distrito"];
	}
	
	public function ver_distritos (){
		$sql = "SELECT * FROM distrito";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function retornar_SELECT (){
		return $this->_conexion->retornar_array();
	}
	
}

?>