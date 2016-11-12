<?php

	class TipoUsuario{

		private $codigoTipoUsuario;
		private $nombreTipoUsuario;

		public function __construct($codigoTipoUsuario,
					$nombreTipoUsuario){
			$this->codigoTipoUsuario = $codigoTipoUsuario;
			$this->nombreTipoUsuario = $nombreTipoUsuario;
		}
		public function getCodigoTipoUsuario(){
			return $this->codigoTipoUsuario;
		}
		public function setCodigoTipoUsuario($codigoTipoUsuario){
			$this->codigoTipoUsuario = $codigoTipoUsuario;
		}
		public function getNombreTipoUsuario(){
			return $this->nombreTipoUsuario;
		}
		public function setNombreTipoUsuario($nombreTipoUsuario){
			$this->nombreTipoUsuario = $nombreTipoUsuario;
		}

	}
?>