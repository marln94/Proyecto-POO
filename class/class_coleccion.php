<?php

	class Coleccion{

		private $codigoColeccion;
		private $nombreColeccion;
		private $estado;

		public function __construct($codigoColeccion,
					$nombreColeccion,
					$estado){
			$this->codigoColeccion = $codigoColeccion;
			$this->nombreColeccion = $nombreColeccion;
			$this->estado = $estado;
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
			$this->nombreColeccion = $nombreColeccion;
		}
		public function getEstado(){
			return $this->estado;
		}
		public function setEstado($estado){
			$this->estado = $estado;
		}

		public static function listadoColecciones($conexion){
			$sql = sprintf("
				SELECT codigo_coleccion,nombre_coleccion
				FROM tbl_colecciones
				WHERE estado=1"
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			while($fila = $conexion->obtenerFila($resultado)){
			?>
			<tr>
	            <td><?php echo $fila["codigo_coleccion"] ?></td>
	            <td><?php echo $fila["nombre_coleccion"] ?></td>
	        </tr>
			<?php
			}
		}
	}
?>