<?php 
require_once ("../require/conexion_class.php");

class experiencia_laboral {
	private $_conexion;
	
	public function __construct (){
		$this->_conexion = new conexion;
	}
	
	public function verificar_experiencia_laboral ($id_persona){
		$sql = "SELECT * FROM cuadro_experiencia WHERE id_persona ='".$id_persona."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		return $this->_conexion->tam_respuesta();
	}
	
	public function ver_experiencia_laboral ($id_persona){
		$sql = "SELECT * FROM experiencia_laboral,cuadro_experiencia WHERE cuadro_experiencia.id_persona = '".$id_persona."'
		 AND experiencia_laboral.id_experiencia = cuadro_experiencia.id_experiencia ";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	
	private function buscar_id_experiencia ($nom_proyecto, $fecha_inicio, $fecha_fin, $id_categoria){
		$sql = "SELECT * FROM experiencia_laboral WHERE nom_proyecto ='".$nom_proyecto."' AND fecha_inicio ='".$fecha_inicio."'
					AND fecha_fin ='".$fecha_fin."' AND id_categoria ='".$id_categoria."' ORDER BY id_experiencia DESC LIMIT 1 ";
		$this->_conexion->ejecutar_sentencia($sql);
		$experiencia = $this->_conexion->retornar_array();
		return $experiencia["id_experiencia"];
	}
	
	private function guardar_experiencia ($nom_proyecto, $fecha_inicio, $fecha_fin, $id_categoria){
		$sql = "INSERT INTO `experiencia_laboral`(`id_experiencia`, `nom_proyecto`, `id_categoria`, `fecha_inicio`, `fecha_fin`) 
					VALUES (null , '".$nom_proyecto."', '".$id_categoria."', '".$fecha_inicio."', '".$fecha_fin."')";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	private function guardar_cuadro_experiencia ($id_experiencia, $id_persona){
		$sql = "INSERT INTO `cuadro_experiencia`(`id_cuadro_exp`, `id_experiencia`, `id_persona`) 
					VALUES (null, '".$id_experiencia."', '".$id_persona."') ";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function registrar_experiencia ($id_persona, $nom_proyecto, $fecha_inicio, $fecha_fin, $id_categoria){
		$this->guardar_experiencia ($nom_proyecto, $fecha_inicio, $fecha_fin, $id_categoria);
		$id_experiencia = $this->buscar_id_experiencia ($nom_proyecto, $fecha_inicio, $fecha_fin, $id_categoria);
		return $this->guardar_cuadro_experiencia ($id_experiencia, $id_persona);
	}
	
	public function retornar_SELECT (){
		return $this->_conexion->retornar_array();
	}
}

?>