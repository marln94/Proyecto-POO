<?php

	class Autor{

		private $codigoAutor;
		private $codigoNacionalidad;
		private $codigoLenguaMaterna;
		private $nombre;
		private $apellido;
		private $fechaNacimiento;
		private $fechaFallecimiento;
		private $estado;

		public function __construct($codigoAutor,
					$codigoNacionalidad,
					$codigoLenguaMaterna,
					$nombre,
					$apellido,
					$fechaNacimiento,
					$fechaFallecimiento,
					$estado){
			$this->codigoAutor = $codigoAutor;
			$this->codigoNacionalidad = $codigoNacionalidad;
			$this->codigoLenguaMaterna = $codigoLenguaMaterna;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->fechaNacimiento = $fechaNacimiento;
			$this->fechaFallecimiento = $fechaFallecimiento;
			$this->estado = $estado;
		}
		public function getCodigoAutor(){
			return $this->codigoAutor;
		}
		public function setCodigoAutor($codigoAutor){
			$this->codigoAutor = $codigoAutor;
		}
		public function getCodigoNacionalidad(){
			return $this->codigoNacionalidad;
		}
		public function setCodigoNacionalidad($codigoNacionalidad){
			$this->codigoNacionalidad = $codigoNacionalidad;
		}
		public function getCodigoLenguaMaterna(){
			return $this->codigoLenguaMaterna;
		}
		public function setCodigoLenguaMaterna($codigoLenguaMaterna){
			$this->codigoLenguaMaterna = $codigoLenguaMaterna;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function getApellido(){
			return $this->apellido;
		}
		public function setApellido($apellido){
			$this->apellido = $apellido;
		}
		public function getFechaNacimiento(){
			return $this->fechaNacimiento;
		}
		public function setFechaNacimiento($fechaNacimiento){
			$this->fechaNacimiento = $fechaNacimiento;
		}
		public function getFechaFallecimiento(){
			return $this->fechaFallecimiento;
		}
		public function setFechaFallecimiento($fechaFallecimiento){
			$this->fechaFallecimiento = $fechaFallecimiento;
		}
		public function getEstado(){
			return $this->estado;
		}
		public function setEstado($estado){
			$this->estado = $estado;
		}

		public static function listadoAutores($conexion){
			$sql = sprintf("
				SELECT a.codigo_autor,a.nombre,a.apellido,a.fecha_nacimiento,a.fecha_fallecimiento,b.nombre_nacionalidad,c.nombre_lengua_materna
				FROM tbl_autores a
				INNER JOIN tbl_nacionalidades b
					ON a.codigo_nacionalidad=b.codigo_nacionalidad
				INNER JOIN tbl_lenguas_maternas c
					ON a.codigo_lengua_materna=c.codigo_lengua_materna
				WHERE a.estado=1"
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			while($fila = $conexion->obtenerFila($resultado)){
			?>
			<tr>
	            <td><?php echo $fila["codigo_autor"] ?></td>
	            <td><?php echo $fila["nombre"]." ".$fila["apellido"] ?></td>
	            <td><?php echo $fila["fecha_nacimiento"] ?></td>
	            <td><?php echo $fila["fecha_fallecimiento"] ?></td>
	            <td><?php echo $fila["nombre_nacionalidad"] ?></td>
	            <td><?php echo $fila["nombre_lengua_materna"] ?></td>
	        </tr>
			<?php
			}
		}

		public function guardarRegistro($conexion){
			$sql = sprintf("
				SELECT codigo_nacionalidad
				FROM tbl_nacionalidades
				WHERE nombre_nacionalidad = '%s'",
				$conexion->escaparCaracteres($this->codigoNacionalidad)
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			if($conexion->cantidadRegistros($resultado) > 0){
				$fila = $conexion->obtenerFila($resultado);
				$this->codigoNacionalidad = $fila["codigo_nacionalidad"];
			} else{
				$sql = sprintf("
					INSERT INTO tbl_nacionalidades(codigo_nacionalidad,nombre_nacionalidad)
					VALUES (NULL,'%s')",
					$conexion->escaparCaracteres($this->codigoNacionalidad)
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
				$this->codigoNacionalidad = $conexion->ultimoId();
			}
			$sql = sprintf("
				SELECT codigo_lengua_materna
				FROM tbl_lenguas_maternas
				WHERE nombre_lengua_materna = '%s'",
				$conexion->escaparCaracteres($this->codigoLenguaMaterna)
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			if($conexion->cantidadRegistros($resultado) > 0){
				$fila = $conexion->obtenerFila($resultado);
				$this->codigoLenguaMaterna = $fila["codigo_lengua_materna"];
			} else{
				$sql = sprintf("
					INSERT INTO tbl_lenguas_maternas(codigo_lengua_materna,nombre_lengua_materna)
					VALUES (NULL,'%s')",
					$conexion->escaparCaracteres($this->codigoLenguaMaterna)
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
				$this->codigoLenguaMaterna = $conexion->ultimoId();
			}
			if($this->fechaFallecimiento == ""){
				$sql = sprintf("
					INSERT INTO tbl_autores(codigo_autor, codigo_nacionalidad, 
						codigo_lengua_materna, nombre, 
						apellido, fecha_nacimiento, 
						fecha_fallecimiento, estado)
					VALUES (NULL, '%s','%s','%s','%s','%s',NULL,'%s')",
					$conexion->escaparCaracteres($this->codigoNacionalidad),
					$conexion->escaparCaracteres($this->codigoLenguaMaterna),
					$conexion->escaparCaracteres($this->nombre),
					$conexion->escaparCaracteres($this->apellido),
					$conexion->escaparCaracteres($this->fechaNacimiento),
					$conexion->escaparCaracteres($this->estado)
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
			}else{
				$sql = sprintf("
					INSERT INTO tbl_autores(codigo_autor, codigo_nacionalidad, 
						codigo_lengua_materna, nombre, 
						apellido, fecha_nacimiento, 
						fecha_fallecimiento, estado)
					VALUES (NULL, '%s','%s','%s','%s','%s','%s','%s')",
					$conexion->escaparCaracteres($this->codigoNacionalidad),
					$conexion->escaparCaracteres($this->codigoLenguaMaterna),
					$conexion->escaparCaracteres($this->nombre),
					$conexion->escaparCaracteres($this->apellido),
					$conexion->escaparCaracteres($this->fechaNacimiento),
					$conexion->escaparCaracteres($this->fechaFallecimiento),
					$conexion->escaparCaracteres($this->estado)
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
			}
		}

		public static function retirarAutor($conexion,$codigoAutor){
			$sql = sprintf("
				SELECT b.estado
				FROM tbl_autores_x_libros a
				INNER JOIN tbl_libros b
					ON a.codigo_libro=b.codigo_libro
				WHERE a.codigo_autor='%s'",
				$codigoAutor
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
					FROM tbl_autores
					WHERE codigo_autor='%s'",
					$codigoAutor
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
				$fila = $conexion->obtenerFila($resultado);
				if($fila["estado"] == 1){
					$sql = sprintf("
						UPDATE tbl_autores
						SET estado='%s'
						WHERE codigo_autor='%s'",
						0,
						$codigoAutor
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