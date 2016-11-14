<?php

	class Autor{

		private $codigoautor;
		private $codigonacionalidad;
		private $codigolenguamaterna;
		private $nombreyapellido;
		private $fechanacimiento;
		private $fechafallecimiento;
		private $imagen;

		public function __construct($codigoautor,
					$codigonacionalidad,
					$codigolenguamaterna,
					$nombreyapellido,
					$fechanacimiento,
					$fechafallecimiento,
					$imagen){
			$this->codigoautor = $codigoautor;
			$this->codigonacionalidad = $codigonacionalidad;
			$this->codigolenguamaterna = $codigolenguamaterna;
			$this->nombreyapellido = $nombreyapellido;
			$this->fechanacimiento = $fechanacimiento;
			$this->fechafallecimiento = $fechafallecimiento;
			$this->imagen = $imagen;
		}
		public function getCodigoautor(){
			return $this->codigoautor;
		}
		public function setCodigoautor($codigoautor){
			$this->codigoautor = $codigoautor;
		}
		public function getCodigonacionalidad(){
			return $this->codigonacionalidad;
		}
		public function setCodigonacionalidad($codigonacionalidad){
			$this->codigonacionalidad = $codigonacionalidad;
		}
		public function getCodigolenguamaterna(){
			return $this->codigolenguamaterna;
		}
		public function setCodigolenguamaterna($codigolenguamaterna){
			$this->codigolenguamaterna = $codigolenguamaterna;
		}
		public function getNombreyapellido(){
			return $this->nombreyapellido;
		}
		public function setNombreyapellido($nombreyapellido){
			$this->nombreyapellido = $nombreyapellido;
		}
		public function getFechanacimiento(){
			return $this->fechanacimiento;
		}
		public function setFechanacimiento($fechanacimiento){
			$this->fechanacimiento = $fechanacimiento;
		}
		public function getFechafallecimiento(){
			return $this->fechafallecimiento;
		}
		public function setFechafallecimiento($fechafallecimiento){
			$this->fechafallecimiento = $fechafallecimiento;
		}
		public function getImagen(){
			return $this->imagen;
		}
		public function setImagen($imagen){
			$this->imagen = $imagen;
		}
		public function toString(){
			return "Codigoautor: " . $this->codigoautor . 
				" Codigonacionalidad: " . $this->codigonacionalidad . 
				" Codigolenguamaterna: " . $this->codigolenguamaterna . 
				" Nombreyapellido: " . $this->nombreyapellido . 
				" Fechanacimiento: " . $this->fechanacimiento . 
				" Fechafallecimiento: " . $this->fechafallecimiento . 
				" Imagen: " . $this->imagen;
		}
	}
?>