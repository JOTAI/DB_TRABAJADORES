<?php 
require_once ("../require/conexion_class.php");

class cuadro_familiar {
	private $_conexion;
	
	public function __construct (){
		$this->_conexion = new conexion;
	}
	
	public function verificar_cuadro_familiar ($id_persona){
		$sql = "SELECT * FROM cuadro_familiar WHERE id_persona ='".$id_persona."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		return $this->_conexion->tam_respuesta();
	}
	
	public function ver_cuadro_familiar ($id_persona){
		$sql = "SELECT * FROM familiares,cuadro_familiar WHERE cuadro_familiar.id_persona = '".$id_persona."' AND
					familiares.id_familiar = cuadro_familiar.id_familiar ";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	
	private function buscar_id_familiar ($familiar, $fecha_nac, $DNI, $id_parentesco){
		$sql = "SELECT * FROM familiares WHERE familiar ='".$familiar."' AND fecha_nac ='".$fecha_nac."' AND
					DNI ='".$DNI."' AND id_parentesco ='".$id_parentesco."' ORDER BY id_familiar DESC LIMIT 1 ";
		$this->_conexion->ejecutar_sentencia($sql);
		$familiares = $this->_conexion->retornar_array();
		return $familiares["id_familiar"];
	}
	
	private function guardar_familiar ($familiar, $fecha_nac, $DNI, $id_parentesco){
		$sql = "INSERT INTO `familiares`(`id_familiar`, `familiar`, `fecha_nac`, `DNI`, `id_parentesco`) 
					VALUES (null , '".$familiar."', '".$fecha_nac."', '".$DNI."', '".$id_parentesco."')";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	private function guardar_cuadro_familiar ($id_familiar, $id_persona){
		$sql = "INSERT INTO `cuadro_familiar`(`id_cuadro_fam`, `id_familiar`, `id_persona`) 
					VALUES (null, '".$id_familiar."', '".$id_persona."') ";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function registrar_familiar ($id_persona, $familiar, $fecha_nac, $DNI, $id_parentesco){
		$this->guardar_familiar ($familiar, $fecha_nac, $DNI, $id_parentesco);
		$id_familiar = $this->buscar_id_familiar($familiar, $fecha_nac, $DNI, $id_parentesco);
		return $this->guardar_cuadro_familiar($id_familiar, $id_persona);
	}
	
	public function retornar_SELECT (){
		return $this->_conexion->retornar_array();
	}
	
}

?>