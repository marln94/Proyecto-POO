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

		public function guardarRegistro($conexion){
			$sql = sprintf("
				INSERT INTO tbl_colecciones(codigo_coleccion,nombre_coleccion,estado)
				VALUES (NULL,'%s','%s')",
				$conexion->escaparCaracteres($this->nombreColeccion),
				$this->estado
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
		}

		public static function retirarColeccion($conexion,$codigoColeccion){
			$sql = sprintf("
				SELECT estado
				FROM tbl_libros
				WHERE codigo_coleccion='%s'",
				$codigoColeccion
				);
			$resultado = $conexion->ejecutarInstruccion($sql);
			$eliminar = true;
			while($fila = $conexion->obtenerFila($resultado)){
				if($fila["estado"] == 1){
					$eliminar = false;
					break;
				}
			}
			if($eliminar){
				$sql = sprintf("
					SELECT estado
					FROM tbl_colecciones
					WHERE codigo_coleccion='%s'",
					$codigoColeccion
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
				$fila = $conexion->obtenerFila($resultado);
				if($fila["estado"] == 1){
					$sql = sprintf("
						UPDATE tbl_colecciones
						SET estado='%s'
						WHERE codigo_coleccion='%s'",
						0,
						$codigoColeccion
					);
					$resultado = $conexion->ejecutarInstruccion($sql);
				} else{
					echo "error";
				}
			} else{
				echo "error";
			}
		}
	}
?>