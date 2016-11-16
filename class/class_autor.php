<?php
	class Autor{
		private $codigoAutor;
		private $codigoNacionalidad;
		private $codigoLenguaMaterna;
		private $nombreyApellido;
		private $fechaNacimiento;
		private $fechaFallecimiento;
		private $imagen;

		public function __construct($codigoAutor,
					$codigoNacionalidad,
					$codigoLenguaMaterna,
					$nombreyApellido,
					$fechaNacimiento,
					$fechaFallecimiento,
					$imagen){
			$this->codigoAutor = $codigoAutor;
			$this->codigoNacionalidad = $codigoNacionalidad;
			$this->codigoenguaMaterna = $codigoLenguaMaterna;
			$this->nombreyApellido = $nombreyApellido;
			$this->fechaNacimiento = $fechaNacimiento;
			$this->fechaFallecimiento = $fechaFallecimiento;
			$this->imagen = $imagen;
		}
		public function getCodigoAutor(){
			return $this->codigoAutor;
		}
		public function setCodigoAutor($codigoAutor){
			$this->codigoautor = $codigoAutor;
		}
		public function getCodigoNacionalidad(){
			return $this->codigoNacionalidad;
		}
		public function setCodigonNacionalidad($codigoNacionalidad){
			$this->codigoNacionalidad = $codigoNacionalidad;
		}
		public function getCodigoLenguaMaterna(){
			return $this->codigoLenguaMaterna;
		}
		public function setCodigoLenguaMaterna($codigoLenguaMaterna){
			$this->codigoLenguaMaterna = $codigoLenguaMaterna;
		}
		public function getNombreyApellido(){
			return $this->nombreyApellido;
		}
		public function setNombreyApellido($nombreyApellido){
			$this->nombreyApellido = $nombreyApellido;
		}
		public function getFechaNacimiento(){
			return $this->fechaNacimiento;
		}
		public function setFechaNacimiento($fechaNacimiento){
			$this->fechaNacimiento = $fechaNacimiento;
		}
		public function getFechaFallecimiento(){
			return $this->fechaFallecimiento;
		}
		public function setFechaFallecimiento($fechaFallecimiento){
			$this->fechaFallecimiento = $fechaFallecimiento;
		}
		public function getImagen(){
			return $this->imagen;
		}
		public function setImagen($imagen){
			$this->imagen = $imagen;
		}
		public function toString(){
			return "CodigoAutor: " . $this->codigoAutor . 
				" CodigoNacionalidad: " . $this->codigoNacionalidad . 
				" Codigolenguamaterna: " . $this->codigoLenguaMaterna . 
				" NombreyApellido: " . $this->nombreyApellido . 
				" FechaNacimiento: " . $this->fechaNacimiento . 
				" FechaFallecimiento: " . $this->fechaFallecimiento . 
				" Imagen: " . $this->imagen;
		}
	}
?>