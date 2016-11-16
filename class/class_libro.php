<?php
	
	session_start();
	
	class Libro{

		private $codigoLibro;
		private $codigoTipoLibro;
		private $codigoEditorial;
		private $codigoAnioPublicacion;
		private $codigoColeccion;
		private $codigoDisponibilidad;
		private $edicion;
		private $tituloLibro;
		private $cantidadLibros;
		private $descripcionFisica;
		private $ISBN;
		private $urlImagenLibro;
		private $urlImagenCodigoQR;

		public function __construct($codigoLibro,
					$codigoTipoLibro,
					$codigoEditorial,
					$codigoAnioPublicacion,
					$codigoColeccion,
					$codigoDisponibilidad,
					$edicion,
					$tituloLibro,
					$cantidadLibros,
					$descripcionFisica,
					$ISBN,
					$urlImagenLibro,
					$urlImagenCodigoQR){
			$this->codigoLibro = $codigoLibro;
			$this->codigoTipoLibro = $codigoTipoLibro;
			$this->codigoEditorial = $codigoEditorial;
			$this->codigoAnioPublicacion = $codigoAnioPublicacion;
			$this->codigoColeccion = $codigoColeccion;
			$this->codigoDisponibilidad = $codigoDisponibilidad;
			$this->edicion = $edicion;
			$this->tituloLibro = $tituloLibro;
			$this->cantidadLibros = $cantidadLibros;
			$this->descripcionFisica = $descripcionFisica;
			$this->ISBN = $ISBN;
			$this->urlImagenLibro = $urlImagenLibro;
			$this->urlImagenCodigoQR = $urlImagenCodigoQR;
		}
		public function getCodigoLibro(){
			return $this->codigoLibro;
		}
		public function setCodigoLibro($codigoLibro){
			$this->codigoLibro = $codigoLibro;
		}
		public function getCodigoTipoLibro(){
			return $this->codigoTipoLibro;
		}
		public function setCodigoTipoLibro($codigoTipoLibro){
			$this->codigoTipoLibro = $codigoTipoLibro;
		}
		public function getCodigoEditorial(){
			return $this->codigoEditorial;
		}
		public function setCodigoEditorial($codigoEditorial){
			$this->codigoEditorial = $codigoEditorial;
		}
		public function getCodigoAnioPublicacion(){
			return $this->codigoAnioPublicacion;
		}
		public function setCodigoAnioPublicacion($codigoAnioPublicacion){
			$this->codigoAnioPublicacion = $codigoAnioPublicacion;
		}
		public function getCodigoColeccion(){
			return $this->codigoColeccion;
		}
		public function setCodigoColeccion($codigoColeccion){
			$this->codigoColeccion = $codigoColeccion;
		}
		public function getCodigoDisponibilidad(){
			return $this->codigoDisponibilidad;
		}
		public function setCodigoDisponibilidad($codigoDisponibilidad){
			$this->codigoDisponibilidad = $codigoDisponibilidad;
		}
		public function getEdicion(){
			return $this->edicion;
		}
		public function setEdicion($edicion){
			$this->edicion = $edicion;
		}
		public function getTituloLibro(){
			return $this->tituloLibro;
		}
		public function setTituloLibro($tituloLibro){
			$this->tituloLibro = $tituloLibro;
		}
		public function getCantidadLibros(){
			return $this->cantidadLibros;
		}
		public function setCantidadLibros($cantidadLibros){
			$this->cantidadLibros = $cantidadLibros;
		}
		public function getDescripcionFisica(){
			return $this->descripcionFisica;
		}
		public function setDescripcionFisica($descripcionFisica){
			$this->descripcionFisica = $descripcionFisica;
		}
		public function getISBN(){
			return $this->ISBN;
		}
		public function setISBN($ISBN){
			$this->ISBN = $ISBN;
		}
		public function getUrlImagenLibro(){
			return $this->urlImagenLibro;
		}
		public function setUrlImagenLibro($urlImagenLibro){
			$this->urlImagenLibro = $urlImagenLibro;
		}
		public function getUrlImagenCodigoQR(){
			return $this->urlImagenCodigoQR;
		}
		public function setUrlImagenCodigoQR($urlImagenCodigoQR){
			$this->urlImagenCodigoQR = $urlImagenCodigoQR;
		}

		public static function informacionLibro($conexion,$codigoLibro,$codigoTipoUsuario){
			$sql = sprintf("
				SELECT a.codigo_libro, b.nombre_tipo_libro, 
						c.nombre_editorial, d.anio_publicacion, 
						e.nombre_coleccion, f.nombre_disponibilidad, 
						a.edicion, a.titulo_libro, 
						a.cantidad_libros, a.descripcion_fisica, 
						a.ISBN, a.url_imagen_libro, 
						f.codigo_disponibilidad, b.codigo_tipo_libro
				FROM tbl_libros a
				INNER JOIN tbl_tipos_libros b
					ON a.codigo_tipo_libro = b.codigo_tipo_libro
				INNER JOIN tbl_editoriales c
					ON a.codigo_editorial = c.codigo_editorial
				INNER JOIN tbl_anios_publicaciones d
					ON a.codigo_anio_publicacion = d.codigo_anio_publicacion
				INNER JOIN tbl_colecciones e
					ON a.codigo_coleccion = e.codigo_coleccion
				INNER JOIN tbl_disponibilidades f
					ON a.codigo_disponibilidad = f.codigo_disponibilidad

				WHERE codigo_libro = '%s'",
				$codigoLibro
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			$fila1 = $conexion->obtenerFila($resultado);



			?>
			
			<div class="x_panel">
              	<div class="x_title">
                	<h3><?php echo $fila1['titulo_libro']?></h3>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row top_tiles" >
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<?php
							if(!empty($fila1['url_imagen_libro'])){
						?>
			            <img id="img-portada-libro" src="../upload/<?php echo $fila1['url_imagen_libro']?>" class="img-portada-libro-2 img-responsive">
			            <?php
			            	} else{
			            ?>
			            <img id="img-portada-libro" src="../upload/portadas/no-disponible.png" class="img-portada-libro-2 img-responsive">
			            <?php
			            	}
			            ?>
			            <div style="width: 80%;margin: 0 auto;">
			              <div class="btn-group-vertical" style="width: 100%; margin-top: 5%;">
			              <?php
		                	$solicitar = "";
		                	$leer = "";
		                	if($fila1['codigo_disponibilidad']==1 && $fila1['codigo_tipo_libro']==1){
		                		$leer = "disabled";
		                	}
		                	if($fila1['codigo_disponibilidad']==1 && $fila1['codigo_tipo_libro']==2){
		                		$solicitar = "disabled";
		                	}
		                	if($fila1['codigo_disponibilidad']==2 && $fila1['codigo_tipo_libro']==1){
		                		$solicitar = "disabled";
		                		$leer = "disabled";
		                	}
		                	if($fila1['codigo_disponibilidad']==2 && $fila1['codigo_tipo_libro']==2){
		                		$solicitar = "disabled";
		                		$leer = "disabled";
		                	}
			                ?>
			                <button onclick="solicitarLibro(<?php echo $fila1['codigo_libro'] ?>)" class="btn btn-default" id="btn-solicitar" <?php echo $solicitar ?> >Solicitar libro</button>
			                <button class="btn btn-default" id="leer-digital" <?php echo $leer?> >Leer en digital</button>

			              </div>
			            </div>
			        </div>
			        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			            <table class="table table-striped">
			              	<tr>
			                	<th>Tipo de libro</th>
			                	<td><?php echo $fila1['nombre_tipo_libro']?></td>
			              	</tr>
			              	<tr>
			                	<th>Código de libro</th>
			                	<td><?php echo $fila1['codigo_libro']?></td>
			              	</tr>
			              	<tr>
			                	<th>Título</th>
			                	<td><?php echo $fila1['titulo_libro']?></td>
			              	</tr>
			              	<tr>
			               	 	<th>Autor(es)</th>
			                	<td><?php
										$resultado2 = $conexion->ejecutarInstruccion(
											sprintf("SELECT d.nombre, d.apellido
													FROM tbl_autores_x_libros c
													INNER JOIN tbl_autores d
													ON c.codigo_autor = d.codigo_autor
													WHERE c.codigo_libro = '%s'",
													$fila1['codigo_libro']
											)
										);
										$strAutores = "";
										while($fila2 = $conexion->obtenerFila($resultado2)){
											$strAutores .= $fila2['nombre']." ".$fila2['apellido'].", ";
										}
										echo substr($strAutores, 0, -2);
										$conexion->liberarResultado($resultado2);
		                          	?>
			                    </td>
			              	</tr>
			              	<tr>
			                	<th>Editorial</th>
			                	<td><?php echo $fila1['nombre_editorial']?></td>
			              	</tr>
			              	<tr>
				                <th>Edición</th>
				                <td><?php echo $fila1['edicion']?></td>
			    	        </tr>
			        	    <tr>
			            	    <th>Año publicación</th>
			                	<td><?php echo $fila1['anio_publicacion']?></td>
			              	</tr>
			              	<tr>
			                	<th>Categoría</th>
			                	<td><?php
										$resultado2 = $conexion->ejecutarInstruccion(
											sprintf("SELECT d.nombre_categoria
													FROM tbl_categorias_x_libros c
													INNER JOIN tbl_categorias d
													ON c.codigo_categoria = d.codigo_categoria
													WHERE c.codigo_libro = '%s'",
													$fila1['codigo_libro']
											)
										);
										$strCategoria = "";
										while($fila2 = $conexion->obtenerFila($resultado2)){
											$strCategoria .= $fila2['nombre_categoria'].", ";
										}
										echo substr($strCategoria, 0, -2);
										$conexion->liberarResultado($resultado2);
		                          	?>
		                        </td>
				            </tr>
			              	<tr>
			                	<th>Ejemplares</th>
			                	<td><?php echo $fila1['cantidad_libros']?></td>
				            </tr>
			              	<tr>
			               		<th>Descripción física</th>
			                	<td><?php echo $fila1['descripcion_fisica']?></td>
			              	</tr>
			              	<tr>
			                	<th>Colección</th>
			                	<td><?php echo $fila1['nombre_coleccion']?></td>
			              	</tr>
			              	<tr>
			                	<th>ISBN</th>
			                	<td><?php echo $fila1['ISBN']?></td>
			              	</tr>
			              	<tr>
			                	<th>Sucursal(es)</th>
			                	<td><?php
										$resultado2 = $conexion->ejecutarInstruccion(
											sprintf("SELECT d.direccion_sucursal
													FROM tbl_libros_x_sucursales c
													INNER JOIN tbl_sucursales d
													ON c.codigo_sucursal = d.codigo_sucursal
													WHERE c.codigo_libro = '%s'",
													$fila1['codigo_libro']
											)
										);
										$strSucursales = "";
										while($fila2 = $conexion->obtenerFila($resultado2)){
											$strSucursales .= $fila2['direccion_sucursal']."<br>";
										}
										echo substr($strSucursales, 0, -4);
										$conexion->liberarResultado($resultado2);
		                          	?>
								</td>
			              	</tr>
			              	<tr>
			                	<th>Disponibilidad</th>
			                	<td><?php echo $fila1['nombre_disponibilidad']?></td>
			              	</tr>
			            </table>
			        </div>
			    </div>
            </div>
            <?php
		}

		public static function solicitarLibro($conexion,$codigoLibro,$codigoUsuario,$fechaPrestamo){
			$sql = sprintf("
				SELECT codigo_libro, codigo_usuario
				FROM tbl_prestamos
				WHERE codigo_libro='%s' AND codigo_usuario='%s' AND visible=1",
				$codigoLibro,
				$codigoUsuario
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			if($conexion->cantidadRegistros($resultado) > 0){
				echo "existe";
			} else{
				$sql = sprintf("
					SELECT cantidad_libros, codigo_disponibilidad
					FROM tbl_libros
					WHERE codigo_libro = '%s'",
					$codigoLibro
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
				$fila = $conexion->obtenerFila($resultado);

				$fila['cantidad_libros']--;
				if($fila['cantidad_libros'] == 0){
					$fila['codigo_disponibilidad'] = 2;
				}

				$sql2 = sprintf("
					UPDATE tbl_libros
					SET cantidad_libros = '%s',
						codigo_disponibilidad = '%s'
					WHERE codigo_libro = '%s'",
					$fila['cantidad_libros'],
					$fila['codigo_disponibilidad'],
					$codigoLibro
				);
				$resultado2 = $conexion->ejecutarInstruccion($sql2);
				
				$sql = sprintf("
					INSERT INTO tbl_prestamos(codigo_prestamo, codigo_usuario, 
						codigo_libro, fecha_prestamo, 
						fecha_devolucion, visible) 
					VALUES (NULL,'%s','%s','%s',NULL,%s)",
					$codigoUsuario,
					$codigoLibro,
					$fechaPrestamo,
					1
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
			}
		}

		public static function devolverLibro($conexion,$codigoLibro,$codigoUsuario,$fechaDevolucion){
			$sql = sprintf("
				SELECT codigo_prestamo
				FROM tbl_prestamos
				WHERE codigo_libro = '%s' AND visible!='%s' AND codigo_usuario='%s'",
				$codigoLibro,
				0,
				$codigoUsuario
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			$fila3 = $conexion->obtenerFila($resultado);

			$sql2 = sprintf("
				UPDATE tbl_prestamos
				SET fecha_devolucion = '%s',
					visible = '%s'
				WHERE codigo_prestamo = '%s'",
				$fechaDevolucion,
				0,
				$fila3['codigo_prestamo']
			);
			$resultado2 = $conexion->ejecutarInstruccion($sql2);
			if(empty($fila3['codigo_prestamo'])){
				echo "vacio";
			}else{
				$sql = sprintf("
					SELECT cantidad_libros, codigo_disponibilidad
					FROM tbl_libros
					WHERE codigo_libro = '%s'",
					$codigoLibro
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
				$fila = $conexion->obtenerFila($resultado);
				$fila['cantidad_libros']++;
				if($fila['cantidad_libros'] != 0){
					$fila['codigo_disponibilidad'] = 1;
				}

				$sql2 = sprintf("
					UPDATE tbl_libros
					SET cantidad_libros = '%s',
						codigo_disponibilidad = '%s'
					WHERE codigo_libro = '%s'",
					$fila['cantidad_libros'],
					$fila['codigo_disponibilidad'],
					$codigoLibro
				);
				$resultado2 = $conexion->ejecutarInstruccion($sql2);
			}
		}

		public static function solicitarLibroBibliotecario($conexion,$codigoLibro,$codigoUsuario,$fechaPrestamo){
			$sql = sprintf("
				SELECT cantidad_libros, codigo_disponibilidad
				FROM tbl_libros
				WHERE codigo_libro = '%s'",
				$codigoLibro
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			$fila = $conexion->obtenerFila($resultado);

			
			if($fila['cantidad_libros']-1 >= 0){
				$fila['cantidad_libros']--;
				if($fila['cantidad_libros'] == 0){
					$fila['codigo_disponibilidad'] = 2;
				}
				$sql2 = sprintf("
					UPDATE tbl_libros
					SET cantidad_libros = '%s',
						codigo_disponibilidad = '%s'
					WHERE codigo_libro = '%s'",
					$fila['cantidad_libros'],
					$fila['codigo_disponibilidad'],
					$codigoLibro
				);
				$resultado2 = $conexion->ejecutarInstruccion($sql2);
				
				$sql = sprintf("
					INSERT INTO tbl_prestamos(codigo_prestamo, codigo_usuario, 
						codigo_libro, fecha_prestamo, 
						fecha_devolucion, visible) 
					VALUES (NULL,'%s','%s','%s',NULL,%s)",
					$codigoUsuario,
					$codigoLibro,
					$fechaPrestamo,
					1
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
			}else{
				echo "vacio";
			}

			
		}
	}
?>