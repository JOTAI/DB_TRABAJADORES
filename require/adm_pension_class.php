<?php 
require_once ("../require/conexion_class.php");

class adm_pension {
	private $_conexion;
	
	public function __construct (){
		$this->_conexion = new conexion;
	}
	
	public function ver_adm_pension ($id_adm_pension){
		$sql = "SELECT * FROM adm_pension WHERE id_adm_pension = '".$id_adm_pension."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$adm_pension = $this->_conexion->retornar_array();
		return $adm_pension["nom_pension"];
	}
	
	public function nuevo_adm_pension ($nom_pension){
		$sql = "INSERT INTO adm_pension (`id_adm_pension`, `nom_pension`) VALUES (null, '".$nom_pension."')";
		$this->_conexion->ejecutar_sentencia($sql);
		$sql = "SELECT * FROM adm_pension WHERE nom_pension ='".$nom_pension."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$adm_pension = $this->_conexion->retornar_array();
		return $adm_pension["id_adm_pension"];
	}
	
	public function ver_adm_pensiones (){
		$sql = "SELECT * FROM adm_pension";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function retornar_SELECT (){
		return $this->_conexion->retornar_array();
	}
	
}

?>