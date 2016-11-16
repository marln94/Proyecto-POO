<?php

	class Editorial{

		private $codigoEditorial;
		private $nombreEditorial;
		private $nombreAbreviado;
		private $direccion;
		private $telefono;
		private $correoElectronico;

		public function __construct($codigoEditorial,
					$nombreEditorial,
					$nombreAbreviado,
					$direccion,
					$telefono,
					$correoElectronico){
			$this->codigoEditorial = $codigoEditorial;
			$this->nombreEditorial = $nombreEditorial;
			$this->nombreAbreviado = $nombreAbreviado;
			$this->direccion = $direccion;
			$this->telefono = $telefono;
			$this->correoElectronico = $correoElectronico;
		}
		public function getCodigoEditorial(){
			return $this->codigoEditorial;
		}
		public function setCodigoEditorial($codigoEditorial){
			$this->codigoEditorial = $codigoEditorial;
		}
		public function getNombreEditorial(){
			return $this->nombreEditorial;
		}
		public function setNombreEditorial($nombreEditorial){
			$this->nombreEditorial = $nombreEditorial;
		}
		public function getNombreAbreviado(){
			return $this->nombreAbreviado;
		}
		public function setNombreAbreviado($nombreAbreviado){
			$this->nombreAbreviado = $nombreAbreviado;
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
			return $this->correoElectronico;
		}
		public function setCorreoelectronico($correoElectronico){
			$this->correoElectronico = $correoElectronico;
		}
		public function toString(){
			return "CodigoEditorial: " . $this->codigoEditorial . 
				" NombreEditorial: " . $this->nombreEditorial . 
				" NombreAbreviado: " . $this->nombreAbreviado . 
				" Direccion: " . $this->direccion . 
				" Telefono: " . $this->telefono . 
				" CorreoElectronico: " . $this->correoElectronico;
		}
	}
?>