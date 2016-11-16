<?php

	class Editorial{

		private $codigoeditorial;
		private $nombreeditorial;
		private $nombreabreviado;
		private $direccion;
		private $telefono;
		private $correoelectronico;

		public function __construct($codigoeditorial,
					$nombreeditorial,
					$nombreabreviado,
					$direccion,
					$telefono,
					$correoelectronico){
			$this->codigoeditorial = $codigoeditorial;
			$this->nombreeditorial = $nombreeditorial;
			$this->nombreabreviado = $nombreabreviado;
			$this->direccion = $direccion;
			$this->telefono = $telefono;
			$this->correoelectronico = $correoelectronico;
		}
		public function getCodigoeditorial(){
			return $this->codigoeditorial;
		}
		public function setCodigoeditorial($codigoeditorial){
			$this->codigoeditorial = $codigoeditorial;
		}
		public function getNombreeditorial(){
			return $this->nombreeditorial;
		}
		public function setNombreeditorial($nombreeditorial){
			$this->nombreeditorial = $nombreeditorial;
		}
		public function getNombreabreviado(){
			return $this->nombreabreviado;
		}
		public function setNombreabreviado($nombreabreviado){
			$this->nombreabreviado = $nombreabreviado;
		}
		public function getDireccion(){
			return $this->direccion;
		}
		public function setDireccion($direccion){
			$this->direccion = $direccion;
		}
		public function getTelefono(){
			return $this->telefono;
		}
		public function setTelefono($telefono){
			$this->telefono = $telefono;
		}
		public function getCorreoelectronico(){
			return $this->correoelectronico;
		}
		public function setCorreoelectronico($correoelectronico){
			$this->correoelectronico = $correoelectronico;
		}
		public function toString(){
			return "Codigoeditorial: " . $this->codigoeditorial . 
				" Nombreeditorial: " . $this->nombreeditorial . 
				" Nombreabreviado: " . $this->nombreabreviado . 
				" Direccion: " . $this->direccion . 
				" Telefono: " . $this->telefono . 
				" Correoelectronico: " . $this->correoelectronico;
		}
	}
?>