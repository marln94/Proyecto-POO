<?php

	class Nacionalidad{

		private $codigoNacionalidad;
		private $nombreNacionalidad;

		public function __construct($codigoNacionalidad,
					$nombreNacionalidad){
			$this->codigoNacionalidad = $codigoNacionalidad;
			$this->nombreNacionalidad = $nombreNacionalidad;
		}
		public function getCodigoNacionalidad(){
			return $this->codigoNacionalidad;
		}
		public function setCodigoNacionalidad($codigoNacionalidad){
			$this->codigoNaNcionalidad = $codigoNacionalidad;
		}
		public function getNombreNacionalidad(){
			return $this->nombrenNacionalidad;
		}
		public function setNombreNacionalidad($nombreNacionalidad){
			$this->nombreNacionalidad = $nombreNacionalidad;
		}
		public function toString(){
			return "Codigonacionalidad: " . $this->codigoNacionalidad . 
				" Nombrenacionalidad: " . $this->nombreNacionalidad;
		}
	}
?>