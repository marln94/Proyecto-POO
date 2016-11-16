<?php

	class Sucursal{

		private $codigoSucursal;
		private $direccionSucursal;
		private $telefonoSucursal;

		public function __construct($codigoSucursal,
					$direccionSucursal,
					$telefonoSucursal){
			$this->codigoSucursal = $codigoSucursal;
			$this->direccionSucursal = $direccionSucursal;
			$this->telefonoSucursal = $telefonoSucursal;
		}
		public function getCodigoSucursal(){
			return $this->codigoSucursal;
		}
		public function setCodigoSucursal($codigoSucursal){
			$this->codigoSucursal = $codigoSucursal;
		}
		public function getDireccionSucursal(){
			return $this->direccionSucursal;
		}
		public function setDireccionSucursal($direccionSucursal){
			$this->direccionSucursal = $direccionSucursal;
		}
		public function getTelefonoSucursal(){
			return $this->telefonoSucursal;
		}
		public function setTelefonoSucursal($telefonoSucursal){
			$this->telefonoSucursal = $telefonoSucursal;
		}
		public function toString(){
			return "CodigoSucursal: " . $this->codigoSucursal . 
				" DireccionSucursal: " . $this->direccionSucursal . 
				" TelefonoSucursal: " . $this->telefonoSucursal;
		}
	}
?>