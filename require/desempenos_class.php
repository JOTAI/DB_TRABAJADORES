<?php 
require_once ("../require/conexion_class.php");

class desempenos {
	private $_conexion;
	
	public function __construct (){
		$this->_conexion = new conexion;
	}
	
	public function verificar_desempenos ($id_persona){
		$sql = "SELECT * FROM cuadro_desempenos WHERE id_persona ='".$id_persona."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		return $this->_conexion->tam_respuesta();
	}
	
	public function ver_cuadro_desempeno ($id_persona){
		$sql = "SELECT * FROM desempeno,cuadro_desempenos WHERE cuadro_desempenos.id_persona = '".$id_persona."' AND
					desempeno.id_desempeno = cuadro_desempenos.id_desempeno ";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	
	private function buscar_id_desempeno ($comentario, $id_reportante){
		$sql = "SELECT * FROM desempeno WHERE comentario ='".$comentario."' 
					AND id_reportante ='".$id_reportante."' ORDER BY id_desempeno DESC LIMIT 1 ";
		$this->_conexion->ejecutar_sentencia($sql);
		$desempeno = $this->_conexion->retornar_array();
		return $desempeno["id_desempeno"];
	}
	
	private function guardar_desempeno ($comentario, $id_reportante ){
		$sql = "INSERT INTO `desempeno`(`id_desempeno`, `comentario`, `id_reportante`, `fecha_reporte`) 
					VALUES (null , '".$comentario."', '".$id_reportante."', now() )";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	private function guardar_cuadro_desempeno ($id_desempeno, $id_persona){
		$sql = "INSERT INTO `cuadro_desempenos`(`id_cuadro_desemp`, `id_desempeno`, `id_persona`) 
					VALUES (null, '".$id_desempeno."', '".$id_persona."') ";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function registrar_desempeno ($id_persona, $comentario, $id_reportante){
		$this->guardar_desempeno ($comentario, $id_reportante );
		$id_desempeno = $this->buscar_id_desempeno ( $comentario, $id_reportante);
		return $this->guardar_cuadro_desempeno ($id_desempeno, $id_persona );
	}
	
	public function retornar_SELECT (){
		return $this->_conexion->retornar_array();
	}
	
}

?>