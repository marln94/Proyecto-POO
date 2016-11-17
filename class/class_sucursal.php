<?php

	class Sucursal{

		private $codigoSucursal;
		private $direccionSucursal;
		private $telefonoSucursal;
		private $estado;

		public function __construct($codigoSucursal,
					$direccionSucursal,
					$telefonoSucursal,
					$estado){
			$this->codigoSucursal = $codigoSucursal;
			$this->direccionSucursal = $direccionSucursal;
			$this->telefonoSucursal = $telefonoSucursal;
			$this->estado = $estado;
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
		public function getEstado(){
			return $this->estado;
		}
		public function setEstado($estado){
			$this->estado = $estado;
		}

		public static function listadoSucursales($conexion){
			$sql = sprintf("
				SELECT codigo_sucursal,direccion_sucursal,telefono_sucursal
				FROM tbl_sucursales
				WHERE estado=1"
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			while($fila = $conexion->obtenerFila($resultado)){
			?>
			<tr>
	            <td><?php echo $fila["codigo_sucursal"] ?></td>
	            <td><?php echo $fila["direccion_sucursal"] ?></td>
	            <td><?php echo $fila["telefono_sucursal"] ?></td>
	        </tr>
			<?php
			}
		}

		public function guardarRegistro($conexion){
			$sql = sprintf("
				INSERT INTO tbl_sucursales(codigo_sucursal,direccion_sucursal,telefono_sucursal,estado)
				VALUES(NULL,'%s','%s','%s')",
				$conexion->escaparCaracteres($this->direccionSucursal),
				$conexion->escaparCaracteres($this->telefonoSucursal),
				$conexion->escaparCaracteres($this->estado)
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
		}

		public static function retirarSucursal($conexion,$codigoSucursal){
			$sql = sprintf("
				SELECT b.estado
				FROM tbl_libros_x_sucursales a
				INNER JOIN tbl_libros b
					ON a.codigo_libro=b.codigo_libro
				WHERE a.codigo_sucursal='%s'",
				$codigoSucursal
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
					FROM tbl_sucursales
					WHERE codigo_sucursal='%s'",
					$codigoSucursal
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
				$fila = $conexion->obtenerFila($resultado);
				if($fila["estado"] == 1){
					$sql = sprintf("
						UPDATE tbl_sucursales
						SET estado='%s'
						WHERE codigo_sucursal='%s'",
						0,
						$codigoSucursal
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