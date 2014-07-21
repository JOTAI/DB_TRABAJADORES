<?php 
require_once ("../require/conexion_class.php");

class categorias {
	private $_conexion;
	
	public function __construct (){
		$this->_conexion = new conexion;
	}
	
	public function ver_categoria ($id_categoria){
		$sql = "SELECT * FROM categorias WHERE id_categoria = '".$id_categoria."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$categoria = $this->_conexion->retornar_array();
		return $categoria["nom_categoria"];
	}
	
	public function nuevo_categoria ($nom_categoria){
		$sql = "INSERT INTO categorias (`id_categoria`, `nom_categoria`) VALUES (null, '".$nom_categoria."')";
		$this->_conexion->ejecutar_sentencia($sql);
		$sql = "SELECT * FROM categorias WHERE nom_categoria ='".$nom_categoria."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$categoria = $this->_conexion->retornar_array();
		return $categoria["id_categoria"];
	}
	
	public function ver_categorias (){
		$sql = "SELECT * FROM categorias";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function retornar_SELECT (){
		return $this->_conexion->retornar_array();
	}
	
}

?>