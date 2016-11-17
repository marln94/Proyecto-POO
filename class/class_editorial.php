<?php

	class Editorial{

		private $codigoEditorial;
		private $nombreEditorial;
		private $nombreAbreviado;
		private $direccion;
		private $telefono;
		private $correoElectronico;
		private $estado;

		public function __construct($codigoEditorial,
					$nombreEditorial,
					$nombreAbreviado,
					$direccion,
					$telefono,
					$correoElectronico,
					$estado){
			$this->codigoEditorial = $codigoEditorial;
			$this->nombreEditorial = $nombreEditorial;
			$this->nombreAbreviado = $nombreAbreviado;
			$this->direccion = $direccion;
			$this->telefono = $telefono;
			$this->correoElectronico = $correoElectronico;
			$this->estado = $estado;
		}
		public function getCodigoEditorial(){
			return $this->codigoEditorial;
		}
		public function setCodigoEditorial($codigoEditorial){
			$this->codigoEditorial = $codigoEditorial;
		}
		public function getNombreEditorial(){
			return $this->nombreEditorial;
		}
		public function setNombreEditorial($nombreEditorial){
			$this->nombreEditorial = $nombreEditorial;
		}
		public function getNombreAbreviado(){
			return $this->nombreAbreviado;
		}
		public function setNombreAbreviado($nombreAbreviado){
			$this->nombreAbreviado = $nombreAbreviado;
		}
		public function getDireccion(){
			return $this->direccion;
		}
		public function setDireccion($direccion){
			$this->direccion = $direccion;
		}
		public function getTelefono(){
			return $this->telefono;
		}
		public function setTelefono($telefono){
			$this->telefono = $telefono;
		}
		public function getCorreoElectronico(){
			return $this->correoElectronico;
		}
		public function setCorreoElectronico($correoElectronico){
			$this->correoElectronico = $correoElectronico;
		}
		public function getEstado(){
			return $this->estado;
		}
		public function setEstado($estado){
			$this->estado = $estado;
		}

		public static function listadoEditoriales($conexion){
			$sql = sprintf("
				SELECT codigo_editorial,nombre_editorial,nombre_abreviado,direccion,telefono,correo_electronico
				FROM tbl_editoriales
				WHERE estado=1"
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			while($fila = $conexion->obtenerFila($resultado)){
			?>
			<tr>
	            <td><?php echo $fila["codigo_editorial"] ?></td>
	            <td><?php echo $fila["nombre_editorial"] ?></td>
	            <td><?php echo $fila["nombre_abreviado"] ?></td>
	            <td><?php echo $fila["direccion"] ?></td>
	            <td><?php echo $fila["telefono"] ?></td>
	            <td><?php echo $fila["correo_electronico"] ?></td>
	        </tr>
			<?php
			}
		}

	}
?>