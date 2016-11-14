<?php

	class LenguaMaterna{

		private $codigolenguamaterna;
		private $nombrelenguamaterna;

		public function __construct($codigolenguamaterna,
					$nombrelenguamaterna){
			$this->codigolenguamaterna = $codigolenguamaterna;
			$this->nombrelenguamaterna = $nombrelenguamaterna;
		}
		public function getCodigolenguamaterna(){
			return $this->codigolenguamaterna;
		}
		public function setCodigolenguamaterna($codigolenguamaterna){
			$this->codigolenguamaterna = $codigolenguamaterna;
		}
		public function getNombrelenguamaterna(){
			return $this->nombrelenguamaterna;
		}
		public function setNombrelenguamaterna($nombrelenguamaterna){
			$this->nombrelenguamaterna = $nombrelenguamaterna;
		}
		public function toString(){
			return "Codigolenguamaterna: " . $this->codigolenguamaterna . 
				" Nombrelenguamaterna: " . $this->nombrelenguamaterna;
		}
	}
?>