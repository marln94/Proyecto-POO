<?php

	class Sucursal{

		private $codigosucursal;
		private $direccionsucursal;
		private $telefonosucursal;

		public function __construct($codigosucursal,
					$direccionsucursal,
					$telefonosucursal){
			$this->codigosucursal = $codigosucursal;
			$this->direccionsucursal = $direccionsucursal;
			$this->telefonosucursal = $telefonosucursal;
		}
		public function getCodigosucursal(){
			return $this->codigosucursal;
		}
		public function setCodigosucursal($codigosucursal){
			$this->codigosucursal = $codigosucursal;
		}
		public function getDireccionsucursal(){
			return $this->direccionsucursal;
		}
		public function setDireccionsucursal($direccionsucursal){
			$this->direccionsucursal = $direccionsucursal;
		}
		public function getTelefonosucursal(){
			return $this->telefonosucursal;
		}
		public function setTelefonosucursal($telefonosucursal){
			$this->telefonosucursal = $telefonosucursal;
		}
		public function toString(){
			return "Codigosucursal: " . $this->codigosucursal . 
				" Direccionsucursal: " . $this->direccionsucursal . 
				" Telefonosucursal: " . $this->telefonosucursal;
		}
	}
?>