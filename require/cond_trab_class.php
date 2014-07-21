<?php 
require_once ("../require/conexion_class.php");

class cond_trab {
	private $_conexion;
	
	public function __construct (){
		$this->_conexion = new conexion();
	}

	public function ingresar_trab ($id_persona){
		$sql = "INSERT INTO `cond_trab`(`id_cond_trab`, `id_tipo_cond`, `id_persona`, `fecha_cond`) 
					VALUES (null, '1', '".$id_persona."', now() )";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function cese_trab ($id_persona){
		$sql = "INSERT INTO `cond_trab`(`id_cond_trab`, `id_tipo_cond`, `id_persona`, `fecha_cond`) 
					VALUES (null, '2', '".$id_persona."', now() )";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function ver_fecha_condicion ($id_persona,$id_tipo_cond){
		$sql = "SELECT * FROM cond_trab WHERE id_persona ='".$id_persona."' AND id_tipo_cond ='".$id_tipo_cond."' 
				 ORDER BY id_cond_trab DESC LIMIT 1";
		$this->_conexion->ejecutar_sentencia($sql);
		$condicion = $this->_conexion->retornar_array();
		return $condicion["fecha_cond"];
	}
	
	public function ver_ultima_condicion ($id_persona){
		$sql = "SELECT id_cond_trab,id_persona,id_tipo_cond FROM cond_trab WHERE id_persona = '".$id_persona."' 
					ORDER BY id_cond_trab DESC LIMIT 1 ";
		$this->_conexion->ejecutar_sentencia($sql);
		$condicion = $this->_conexion->retornar_array();
		return $condicion["id_tipo_cond"];
	}
}

?>