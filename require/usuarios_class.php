<?php 
require_once ("../require/conexion_class.php");
require_once ("../require/microtime_text_func.php");
class usuarios {
	private $_conexion;
	private $_id_persona;
	
	public function __construct () {
		$this->_conexion = new conexion;
	}
	
	public function comprobar_usuario ($usuario, $clave){
		$sql = "SELECT usuario,clave,id_persona FROM usuarios WHERE usuario='".$usuario."' AND clave='".$clave."' 
					AND estado_usuario='1' LIMIT 1 ";
		if ($this->_conexion->ejecutar_sentencia($sql)) {
			if($this->_conexion->tam_respuesta() ) {
				$this->_conexion->ejecutar_ultima_sentencia();
				$persona = $this->_conexion->retornar_array();
				$this->_id_persona = $persona["id_persona"];
				return 1;
			} else { return 0;}
		} else {return 0;}
	}

	public function ingresar_usuario ($usuario, $clave, $id_persona){
		$sql = "INSERT INTO `usuarios`(`id_usuario`, `usuario`, `clave`, `estado_usuario`, `id_persona`) 
					VALUES (null, '".$usuario."', '".$clave."', '1', '".$id_persona."')";
		return $this->_conexion->ejecutar_sentencia($sql);
	}

	public function retornar_id_persona (){
		/* se reguiere $this->comprobar_usuario() */
		return $this->_id_persona;
	}

	public function verificar_usuario ($id_persona){
		$sql = "SELECT id_persona,id_usuario,estado_usuario FROM usuarios WHERE id_persona = '".$id_persona."' AND estado_usuario ='1' ";
		$this->_conexion->ejecutar_sentencia($sql);
		return $this->_conexion->tam_respuesta();
	}	
	
	public function verificar_usuario_desactivado ($id_persona){
		$sql = "SELECT id_persona,id_usuario,estado_usuario FROM usuarios WHERE id_persona = '".$id_persona."' AND estado_usuario ='0' ";
		$this->_conexion->ejecutar_sentencia($sql);
		return $this->_conexion->tam_respuesta();
	}	
	
	public function verificar_registrar ($id_persona){
		if($this->verificar_usuario($id_persona)){
			$this->_conexion->ejecutar_ultima_sentencia();
			$verificacion = $this->_conexion->retornar_array();
			return $verificacion["id_usuario"];
		}elseif ($this->verificar_usuario_desactivado($id_persona)){
			$this->activar_usuario($id_persona);
			$this->verificar_registrar($id_persona);
		}else{
			$clave = microtime_text();
			$this->ingresar_usuario('user',$clave,$id_persona);
			$this->verificar_registrar($id_persona);
		}
	}
	
	public function obtener_id_usuario ($id_persona){
		$sql = "SELECT id_persona,id_usuario FROM usuarios WHERE id_persona = '".$id_persona."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$user = $this->_conexion->retornar_array();
		return $user["id_usuario"];
	}
	
	private function cambiar_estado_usuario ($id_persona, $estado_usuario){
		$sql = "UPDATE usuarios SET estado_usuario = '".$estado_usuario."' WHERE id_persona ='".$id_persona."'  ";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
	public function activar_usuario ($id_persona){
		return $this->cambiar_estado_usuario($id_persona, 1);
	}
	
	public function desactivar_usuario ($id_persona){
		return $this->cambiar_estado_usuario($id_persona, 0);
	}

	public function ver_datos_usuario ($id_persona){
		$sql = "SELECT * FROM usuarios WHERE id_persona ='".$id_persona."' LIMIT 1 ";
		$this->_conexion->ejecutar_sentencia($sql);
		return $this->_conexion->retornar_array();
	}
	
	public function cambiar_usuario ($id_persona, $usuario, $clave ){
		$sql = "UPDATE `usuarios` SET `usuario`='".$usuario."',`clave`='".$clave."' WHERE `id_persona`='".$id_persona."' ";
		return $this->_conexion->ejecutar_sentencia($sql);
	}
	
}

?>