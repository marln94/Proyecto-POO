<?php

	class Usuario{

		private $codigoTipoUsuario;
		private $nombre;
		private $apellido;
		private $correoElectronico;
		private $nombreUsuario;
		private $contraseña;
		private $domicilio;
		private $telefono;
		private $imagenUsuario;

		public function __construct($codigoTipoUsuario,
					$nombre,
					$apellido,
					$correoElectronico,
					$nombreUsuario,
					$contraseña,
					$domicilio,
					$telefono,
					$imagenUsuario){
			$this->codigoTipoUsuario = $codigoTipoUsuario;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->correoElectronico = $correoElectronico;
			$this->nombreUsuario = $nombreUsuario;
			$this->contraseña = $contraseña;
			$this->domicilio = $domicilio;
			$this->telefono = $telefono;
			$this->imagenUsuario = $imagenUsuario;
		}
		public function getCodigoTipoUsuario(){
			return $this->codigoTipoUsuario;
		}
		public function setCodigoTipoUsuario($codigoTipoUsuario){
			$this->codigoTipoUsuario = $codigoTipoUsuario;
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
		public function getNombreUsuario(){
			return $this->nombreUsuario;
		}
		public function setNombreUsuario($nombreUsuario){
			$this->nombreUsuario = $nombreUsuario;
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
						nombre_usuario, 
						contrasena, 
						domicilio, 
						telefono, 
						imagen_usuario
					) VALUES (
					NULL, %s, '%s', '%s', '%s', '%s', '%s', NULL, NULL, NULL
				)",
				stripslashes($this->codigoTipoUsuario),
				stripslashes($this->nombre),
				stripslashes($this->apellido),
				stripslashes($this->correoElectronico),
				stripslashes($this->nombreUsuario),
				stripslashes($this->contraseña)
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
		}

	}
?>