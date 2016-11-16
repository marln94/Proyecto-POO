<?php
	include_once("class_tipo_usuario.php");

	class Usuario{

		private $codigoUsuario;
		private $tipoUsuario;
		private $nombre;
		private $apellido;
		private $correoElectronico;
		private $contraseña;
		private $domicilio;
		private $telefono;
		private $imagenUsuario;

		public function __construct($codigoUsuario,
					$tipoUsuario,
					$nombre,
					$apellido,
					$correoElectronico,
					$contraseña,
					$domicilio,
					$telefono,
					$imagenUsuario){
			$this->codigoUsuario = $codigoUsuario;
			$this->tipoUsuario = $tipoUsuario;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->correoElectronico = $correoElectronico;
			$this->contraseña = $contraseña;
			$this->domicilio = $domicilio;
			$this->telefono = $telefono;
			$this->imagenUsuario = $imagenUsuario;
		}
		public function getCodigoUsuario(){
			return $this->codigoUsuario;
		}
		public function setCodigoUsuario($codigoUsuario){
			$this->codigoUsuario = $codigoUsuario;
		}
		public function getTipoUsuario(){
			return $this->tipoUsuario;
		}
		public function setTipoUsuario($tipoUsuario){
			$this->tipoUsuario = $tipoUsuario;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function getApellido(){
			return $this->apellido;
		}
		public function setApellido($apellido){
			$this->apellido = $apellido;
		}
		public function getCorreoElectronico(){
			return $this->correoElectronico;
		}
		public function setCorreoElectronico($correoElectronico){
			$this->correoElectronico = $correoElectronico;
		}
		public function getContraseña(){
			return $this->contraseña;
		}
		public function setContraseña($contraseña){
			$this->contraseña = $contraseña;
		}
		public function getDomicilio(){
			return $this->domicilio;
		}
		public function setDomicilio($domicilio){
			$this->domicilio = $domicilio;
		}
		public function getTelefono(){
			return $this->telefono;
		}
		public function setTelefono($telefono){
			$this->telefono = $telefono;
		}
		public function getImagenUsuario(){
			return $this->imagenUsuario;
		}
		public function setImagenUsuario($imagenUsuario){
			$this->imagenUsuario = $imagenUsuario;
		}

		public function guardarRegistro($conexion){
			$sql = sprintf(
				"INSERT INTO tbl_usuarios(
						codigo_usuario, 
						codigo_tipo_usuario, 
						nombre, 
						apellido, 
						correo_electronico,
						contrasena, 
						domicilio, 
						telefono, 
						imagen_usuario
					) VALUES (
					NULL, %s, '%s', '%s', '%s', '%s', NULL, NULL, NULL
				)",
				stripslashes($this->tipoUsuario->getCodigoTipoUsuario()),
				stripslashes($this->nombre),
				stripslashes($this->apellido),
				stripslashes($this->correoElectronico),
				stripslashes($this->contraseña)
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
		}

		public static function verificarUsuario($conexion,$correoElectronico,$contrasena){
			$sql = sprintf("
				SELECT codigo_usuario, codigo_tipo_usuario, nombre, apellido
				FROM tbl_usuarios 
				WHERE correo_electronico='%s' AND contrasena='%s'",
				stripslashes($correoElectronico),
				stripslashes($contrasena)
			);

			$resultado = $conexion->ejecutarInstruccion($sql);
			
			if($conexion->cantidadRegistros($resultado) > 0){
				return $conexion->obtenerFila($resultado);
			} else{
				return false;
			}
		}
<<<<<<< HEAD
=======

		public static function informacionUsuario($conexion,$codigoUsuario){
			$sql = sprintf("
				SELECT nombre, apellido, correo_electronico, contrasena
				FROM tbl_usuarios 
				WHERE codigo_usuario='%s' AND estado_usuario=1",
				$codigoUsuario
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			return $conexion->obtenerFila($resultado);
		}

		public static function actualizarNombre($conexion,$codigoUsuario,$nuevoValor){
			$sql = sprintf("
				UPDATE tbl_usuarios
				SET nombre='%s'
				WHERE codigo_usuario='%s'",
				$nuevoValor,
				$codigoUsuario
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			if($resultado){
				echo "Nombre actualizado correctamente";
			} else{
				echo "Error en la actualización del nombre";
			}
			return $nuevoValor;
		}
		public static function actualizarApellido($conexion,$codigoUsuario,$nuevoValor){
			$sql = sprintf("
				UPDATE tbl_usuarios
				SET apellido='%s'
				WHERE codigo_usuario='%s'",
				$nuevoValor,
				$codigoUsuario
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			if($resultado){
				echo "Apellido actualizado correctamente";
			} else{
				echo "Error en la actualización del apellido";
			}
			return $nuevoValor;
		}
		public static function actualizarCorreoElectronico($conexion,$codigoUsuario,$nuevoValor){
			$sql = sprintf("
				UPDATE tbl_usuarios
				SET correo_electronico='%s'
				WHERE codigo_usuario='%s'",
				$nuevoValor,
				$codigoUsuario
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			if($resultado){
				echo "Correo electrónico actualizado correctamente";
			} else{
				echo "Error en la actualización del correo electrónico";
			}
		}
		public static function actualizarContraseña($conexion,$codigoUsuario,$nuevoValor,$valorActual){
			$sql = sprintf("
				SELECT contrasena
				FROM tbl_usuarios
				WHERE codigo_usuario='%s'",
				$codigoUsuario
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			$fila = $conexion->obtenerFila($resultado);

			if($fila["contrasena"] == sha1($valorActual)){
				$sql = sprintf("
					UPDATE tbl_usuarios
					SET contrasena=sha1('%s')
					WHERE codigo_usuario='%s' AND contrasena=sha1('%s')",
					$nuevoValor,
					$codigoUsuario,
					$valorActual
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
			} else{
				echo "error";
			}
		}

		public static function eliminarCuenta($conexion,$codigoUsuario){
			$sql = sprintf("
				SELECT visible
				FROM tbl_prestamos
				WHERE codigo_usuario='%s'",
				$codigoUsuario
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			$eliminar = true;
			while ($fila = $conexion->obtenerFila($resultado)) {
				if($fila["visible"] == 1){
					$eliminar = false;
					break;
				}
			}
			if($eliminar){
				$sql = sprintf("
					UPDATE tbl_usuarios
					SET estado_usuario=0
					WHERE codigo_usuario='%s'",
					$codigoUsuario
				);
				echo $sql;
				$resultado = $conexion->ejecutarInstruccion($sql);
				if(!$resultado){
					echo "error";
				}
			} else{
				echo "pendiente";
			}
		}
>>>>>>> origin/master
	}
?>