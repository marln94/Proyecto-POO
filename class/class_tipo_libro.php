<?php

	class TipoLibro{

		private $codigoTipoLibro;
		private $nombreTipoLibro;

		public function __construct($codigoTipoLibro,
					$nombreTipoLibro){
			$this->codigoTipoLibro = $codigoTipoLibro;
			$this->nombreTipoLibro = $nombreTipoLibro;
		}
		public function getCodigoTipoLibro(){
			return $this->codigoTipoLibro;
		}
		public function setCodigoTipoLibro($codigoTipoLibro){
			$this->codigoTipoLibro = $codigoTipoLibro;
		}
		public function getNombreTipoLibro(){
			return $this->nombreTipoLibro;
		}
		public function setNombreTipoLibro($nombreTipoLibro){
			$this->nombreTipoLibro = $nombreTipoLibro;
		}
		public function toString(){
			return "CodigoTipoLibro: " . $this->codigoTipoLibro . 
				" NombreTipoLibro: " . $this->nombreTipoLibro;
		}
	}
?>