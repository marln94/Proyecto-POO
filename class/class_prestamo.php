<?php

	class Prestamo{

		private $codigoPrestamo;
		private $codigoUsuario;
		private $codigoLibro;
		private $fechaPrestamo;
		private $fechaDevolucion;

		public function __construct($codigoPrestamo,
					$codigoUsuario,
					$codigoLibro,
					$fechaPrestamo,
					$fechaDevolucion){
			$this->codigoPrestamo = $codigoPrestamo;
			$this->codigoUsuario = $codigoUsuario;
			$this->codigoLibro = $codigoLibro;
			$this->fechaPrestamo = $fechaPrestamo;
			$this->fechaDevolucion = $fechaDevolucion;
		}
		public function getCodigoPrestamo(){
			return $this->codigoPrestamo;
		}
		public function setCodigoPrestamo($codigoPrestamo){
			$this->codigoPrestamo = $codigoPrestamo;
		}
		public function getCodigoUsuario(){
			return $this->codigoUsuario;
		}
		public function setCodigoUsuario($codigoUsuario){
			$this->codigoUsuario = $codigoUsuario;
		}
		public function getCodigoLibro(){
			return $this->codigoLibro;
		}
		public function setCodigoLibro($codigoLibro){
			$this->codigoLibro = $codigoLibro;
		}
		public function getFechaPrestamo(){
			return $this->fechaPrestamo;
		}
		public function setFechaPrestamo($fechaPrestamo){
			$this->fechaPrestamo = $fechaPrestamo;
		}
		public function getFechaDevolucion(){
			return $this->fechaDevolucion;
		}
		public function setFechaDevolucion($fechaDevolucion){
			$this->fechaDevolucion = $fechaDevolucion;
		}

		public static function prestamosPorUsuario($conexion,$codigoUsuario){
			$sql = sprintf("
					SELECT b.codigo_libro, b.titulo_libro, a.visible
					FROM tbl_prestamos a
					INNER JOIN tbl_libros b
						ON a.codigo_libro = b.codigo_libro
					WHERE a.codigo_usuario = '%s'",
					$codigoUsuario
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			?>
			<thead>
              <th>Libro</th>
              <th>Acción</th>
            </thead>
            <?php
				while($fila = $conexion->obtenerFila($resultado)){
					if($fila['visible'] == 1){
						$resultado2 = $conexion->ejecutarInstruccion(
									sprintf("SELECT d.nombre, d.apellido
											FROM tbl_autores_x_libros c
											INNER JOIN tbl_autores d
											ON c.codigo_autor = d.codigo_autor
											WHERE c.codigo_libro = '%s'",
											$fila['codigo_libro']
										)
									);
						$strAutores = "";
						while($fila2 = $conexion->obtenerFila($resultado2)){
							$strAutores .= $fila2['nombre']." ".$fila2['apellido'].", ";
						}
						$strAutores = substr($strAutores, 0, -2);
            ?>
            <tr>
				<td>
				<?php 
					echo "<strong>".$fila['titulo_libro']."</strong>".", ".$strAutores;
				?>
				</td>
				<td><button class="btn btn-default" onclick="devolverLibro(<?php echo $fila['codigo_libro'] ?>)">Devolver</button></td>
			</tr>
			<?php
					}
				}
		}

		public static function prestamosGeneral($conexion){
			$sql = sprintf("
					SELECT b.codigo_libro, b.titulo_libro, c.nombre, c.apellido, a.codigo_prestamo
					FROM tbl_prestamos a
					INNER JOIN tbl_libros b
						ON a.codigo_libro = b.codigo_libro
					INNER JOIN tbl_usuarios c
						ON c.codigo_usuario = a.codigo_usuario
                    WHERE a.visible = '%s'",
					1
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			?>
			<thead>
              	<th>Código préstamo</th>
	          	<th>Libro</th>
	          	<th>Usuario</th>
            </thead>
            <?php
				while($fila = $conexion->obtenerFila($resultado)){
					$resultado2 = $conexion->ejecutarInstruccion(
								sprintf("SELECT d.nombre, d.apellido
										FROM tbl_autores_x_libros c
										INNER JOIN tbl_autores d
										ON c.codigo_autor = d.codigo_autor
										WHERE c.codigo_libro = '%s'",
										$fila['codigo_libro']
									)
								);
					$strAutores = "";
					while($fila2 = $conexion->obtenerFila($resultado2)){
						$strAutores .= $fila2['nombre']." ".$fila2['apellido'].", ";
					}
					$strAutores = substr($strAutores, 0, -2);
			?>
            <tr>
              	<td><?php echo $fila['codigo_prestamo'] ?></td>
              	<td>
              	<?php 
					echo "<strong>".$fila['titulo_libro']."</strong>".", ".$strAutores;
				?>
				</td>
              	<td><?php echo $fila['nombre']." ".$fila['apellido'] ?></td>
            </tr>
          	<?php
			}
		}
		public static function devolverLibro($conexion,$codigoLibro,$codigoUsuario){
			
		}
	}
?>