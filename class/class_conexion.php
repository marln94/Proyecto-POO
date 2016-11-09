<?php

	class Conexion{

		private $usuario = "root";
		private $contraseña = "";
		private $host = "localhost";
		private $baseDatos = "db_bibliotec";
		private $puerto = "3306";
		private $link;

		public function __construct(){
			$this->establecerConexion();
		}

		public function establecerConexion(){
			$this->link = mysqli_connect($this->host,$this->usuario,$this->contraseña,$this->baseDatos,$this->puerto);
			if(!$this->link){
				echo "No se pudo conectar con MySQL";
				exit;
			}
		}

		public function cerrarConexion(){
			mysqli_close($this->link);
		}

		public function ejecutarInstruccion($sql){
			return mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		}

		public function obtenerFila($resultado){
			return mysqli_fetch_array($resultado);
		}

		public function liberarResultado($resultado){
			mysqli_free_result($resultado);
		}

		public function obtenerCantidadFilas($resultado){
			return mysqli_num_rows($resultado);
		}

		public function getUsuario(){
			return $this->usuario;
		}
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		public function getContraseña(){
			return $this->contraseña;
		}
		public function setContraseña($contraseña){
			$this->contraseña = $contraseña;
		}
		public function getHost(){
			return $this->host;
		}
		public function setHost($host){
			$this->host = $host;
		}
		public function getBaseDatos(){
			return $this->baseDatos;
		}
		public function setBaseDatos($baseDatos){
			$this->baseDatos = $baseDatos;
		}
		public function getPuerto(){
			return $this->puerto;
		}
		public function setPuerto($puerto){
			$this->puerto = $puerto;
		}
		public function getLink(){
			return $this->link;
		}
		public function setLink($link){
			$this->link = $link;
		}

	}
?>