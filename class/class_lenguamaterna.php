<?php

	class LenguaMaterna{

		private $codigoLenguaMaterna;
		private $nombreLenguaMaterna;

		public function __construct($codigoLenguaMaterna,
					$nombreLenguaMterna){
			$this->codigoLenguaMaterna = $codigoLenguaMaterna;
			$this->nombreLenguaMaterna = $nombreLenguaMaterna;
		}
		public function getCodigoLenguaMaterna(){
			return $this->codigoLenguaMaterna;
		}
		public function setCodigoLenguaMaterna($codigoLenguaMaterna){
			$this->codigoLenguaMaterna = $codigoLenguaMaterna;
		}
		public function getNombreLenguaMaterna(){
			return $this->nombreLenguaMaterna;
		}
		public function setNombreLenguaMaterna($nombreLenguaMaterna){
			$this->nombreLenguaMaterna = $nombreLenguaMaterna;
		}
		public function toString(){
			return "CodigoLenguaMaterna: " . $this->codigoLenguaMaterna . 
				" NombreLenguaMaterna: " . $this->nombreLenguaMaterna;
		}
	}
?>