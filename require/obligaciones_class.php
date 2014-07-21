<?php 
require_once ("../require/conexion_class.php");

class obligaciones {
	private $_conexion;
	private $_id_trabajo;
	public function __construct () {
		$this->_conexion = new conexion();
	}
	public function buscar_obligaciones ($id_trabajo){
		$this->_id_trabajo = $id_trabajo;
		$sql = "SELECT * FROM obligaciones,tareas WHERE obligaciones.id_trabajo = '".$this->_id_trabajo."' 
					AND obligaciones.id_tarea = tareas.id_tarea ORDER BY tareas.orden ASC ";
		$this->_conexion->ejecutar_sentencia($sql);
	}
	public function retornar_SELECT (){
		return $this->_conexion->retornar_array();
	}
	public function verificar_tarea($id_trabajo,$nom_tarea) {
		$sql = "SELECT * FROM obligaciones,tareas WHERE obligaciones.id_trabajo = '".$id_trabajo."'
				AND obligaciones.id_tarea = tareas.id_tarea AND tareas.nom_tarea = '".$nom_tarea."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		return $this->_conexion->tam_respuesta();
	}
	public function crear_obligacion($id_trabajo, $id_tarea) {
		$sql = "SELECT * FROM obligaciones WHERE id_trabajo= '".$id_trabajo."' AND id_tarea= '".$id_tarea."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		if($this->_conexion->tam_respuesta() != 0 ) {
			echo "<script type='text/javascript' language='javascript' >
						alert ('Esa tarea ya esta asignada al trabajo');
						</script>";
			return 0;
		} else {
			$sql = "INSERT INTO `obligaciones`(`id_obligacion`, `id_trabajo`, `id_tarea`) 
						VALUES (null, '".$id_trabajo."', '".$id_tarea."')";
			return $this->_conexion->ejecutar_sentencia($sql);
		}
	}
	public function eliminar_obligacion ($id_trabajo, $id_tarea) {
		$sql = "SELECT * FROM obligaciones WHERE id_trabajo= '".$id_trabajo."' AND id_tarea= '".$id_tarea."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		if($this->_conexion->tam_respuesta() != 0 ) {
			$sql = "DELETE FROM `obligaciones` WHERE id_trabajo='".$id_trabajo."' AND  id_tarea= '".$id_tarea."' ";
			return $this->_conexion->ejecutar_sentencia($sql);
		} else {
				echo "<script type='text/javascript' language='javascript' >
						alert ('Esa tarea no habia estado asignada a ese trabajo');
						</script>";
				return 0;
			}
	}

}

?>