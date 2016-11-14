<?php

	class Nacionalidad{

		private $codigonacionalidad;
		private $nombrenacionalidad;

		public function __construct($codigonacionalidad,
					$nombrenacionalidad){
			$this->codigonacionalidad = $codigonacionalidad;
			$this->nombrenacionalidad = $nombrenacionalidad;
		}
		public function getCodigonacionalidad(){
			return $this->codigonacionalidad;
		}
		public function setCodigonacionalidad($codigonacionalidad){
			$this->codigonacionalidad = $codigonacionalidad;
		}
		public function getNombrenacionalidad(){
			return $this->nombrenacionalidad;
		}
		public function setNombrenacionalidad($nombrenacionalidad){
			$this->nombrenacionalidad = $nombrenacionalidad;
		}
		public function toString(){
			return "Codigonacionalidad: " . $this->codigonacionalidad . 
				" Nombrenacionalidad: " . $this->nombrenacionalidad;
		}
	}
?>