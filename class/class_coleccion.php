<?php

	class Coleccion{

		private $codigoColeccion;
		private $nombreColeccion;
		private $cantidadLibros;

		public function __construct($codigoColeccion,
					$nombreColeccion,
					$cantidadLibros){
			$this->codigoColeccion = $codigoColeccion;
			$this->nombreColeccion = $nombreColeccion;
			$this->cantidadLibros = $cantidadLibros;
		}
		public function getCodigoColeccion(){
			return $this->codigoColeccion;
		}
		public function setCodigoColeccion($codigoColeccion){
			$this->codigoColeccion = $codigoColeccion;
		}
		public function getNombreColeccion(){
			return $this->nombreColeccion;
		}
		public function setNombreColeccion($nombreColeccion){
			$this->nombrecoleccion = $nombreColeccion;
		}
		public function getCantidadLibros(){
			return $this->cantidadlibros;
		}
		public function setCantidadlibros($cantidadlibros){
			$this->cantidadlibros = $cantidadlibros;
		}
		public function toString(){
			return "Codigocoleccion: " . $this->codigoColeccion . 
				" Nombrecoleccion: " . $this->nombreColeccion . 
				" Cantidadlibros: " . $this->cantidadLibros;
		}
	}
?>