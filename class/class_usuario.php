<?php
	include_once("class_tipo_usuario.php");

	class usuario{

		private $codigoUsuario;
		private $tipoUsuario;
		private $nombre;
		private $apellido;
		private $correoElectronico;
		private $contraseña;
		private $domicilio;
		private $telefono;
		private $imagenUsuario;
		private $tipoImagen;
		private $estadoUsuario;

		public function __construct($codigoUsuario,
					$tipoUsuario,
					$nombre,
					$apellido,
					$correoElectronico,
					$contraseña,
					$domicilio,
					$telefono,
					$imagenUsuario,
					$tipoImagen,
					$estadoUsuario){
			$this->codigoUsuario = $codigoUsuario;
			$this->tipoUsuario = $tipoUsuario;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->correoElectronico = $correoElectronico;
			$this->contraseña = $contraseña;
			$this->domicilio = $domicilio;
			$this->telefono = $telefono;
			$this->imagenUsuario = $imagenUsuario;
			$this->tipoImagen = $tipoImagen;
			$this->estadoUsuario = $estadoUsuario;
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
		public function getTipoImagen(){
			return $this->tipoImagen;
		}
		public function setTipoImagen($tipoImagen){
			$this->tipoImagen = $tipoImagen;
		}
		public function getEstadoUsuario(){
			return $this->estadoUsuario;
		}
		public function setEstadoUsuario($estadoUsuario){
			$this->estadoUsuario = $estadoUsuario;
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
						imagen_usuario,
						tipo_imagen,
						estado_usuario
					) VALUES (
					NULL, %s, '%s', '%s', '%s', sha1('%s'), NULL, NULL, '%s', '%s','%s'
				)",
				stripslashes($this->tipoUsuario->getCodigoTipoUsuario()),
				stripslashes($this->nombre),
				stripslashes($this->apellido),
				stripslashes($this->correoElectronico),
				stripslashes($this->contraseña),
				stripslashes($this->imagenUsuario),
				stripslashes($this->tipoImagen),
				stripslashes($this->estadoUsuario)
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
		}

		public static function verificarUsuario($conexion,$correoElectronico,$contrasena){
			$sql = sprintf("
				SELECT codigo_usuario, codigo_tipo_usuario, nombre, apellido
				FROM tbl_usuarios 
				WHERE correo_electronico='%s' AND contrasena=sha1('%s') AND estado_usuario=1",
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
	}
?>