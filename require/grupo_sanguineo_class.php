<?php 
require_once ("../require/conexion_class.php");

class grupo_sanguineo {
	private $_conexion;
	
	public function __construct (){
		$this->_conexion = new conexion;
	}
	
	public function ver_grupo_sanguineo ($id_grupo_sanguineo){
		$sql = "SELECT * FROM grupo_sanguineo WHERE id_grupo_sanguineo = '".$id_grupo_sanguineo."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$grupo_sanguineo = $this->_conexion->retornar_array();
		return $grupo_sanguineo["nom_grupo"];
	}
	
	public function nuevo_grupo ($nom_grupo){
		$sql = "INSERT INTO `grupo_sanguineo`(`id_grupo_sanguineo`, `nom_grupo`) VALUES (null, '".$nom_grupo."')";
		$this->_conexion->ejecutar_sentencia($sql);
		$sql = "SELECT * FROM grupo_sanguineo WHERE nom_grupo ='".$nom_grupo."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$grupo_sanguineo = $this->_conexion->retornar_array();
		return $grupo_sanguineo["id_grupo_sanguineo"];
	}
	
	public function ver_grupos_sanguineos (){
		$sql = "SELECT * FROM grupo_sanguineo";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function retornar_SELECT (){
		return $this->_conexion->retornar_array();
	}
}

?>