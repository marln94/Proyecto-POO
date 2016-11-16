<?php


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

		public static function cargarLibrosPorCategoria($conexion, $codigoCategoria){
			$sql1 = sprintf("SELECT nombre_categoria
							FROM tbl_categorias
							WHERE codigo_categoria = '%s'",
							$codigoCategoria
			);
			$resultado1 = $conexion->ejecutarInstruccion($sql1);
			$fila = $conexion->obtenerFila($resultado1);
			?>
			<!-- Nombre de categoría-->
			<div class="x_title">
                <h3><?php echo $fila['nombre_categoria'] ?></h3>
                <div class="clearfix"></div>
            </div>
			<?php
			$sql1 = sprintf("SELECT b.codigo_libro, b.codigo_editorial,
									b.codigo_anio_publicacion, b.titulo_libro, 
									b.url_imagen_libro, a.codigo_libro, c.nombre_categoria
							FROM tbl_categorias_x_libros a
							INNER JOIN tbl_libros b
							ON a.codigo_libro = b.codigo_libro
							INNER JOIN tbl_categorias c
							ON c.codigo_categoria = a.codigo_categoria
							WHERE a.codigo_categoria = '%s'",
							$codigoCategoria
			);
			$resultado1 = $conexion->ejecutarInstruccion($sql1);
			while($fila = $conexion->obtenerFila($resultado1)){
			?>
			<!-- Libros que contiene la categoría -->
            <div class="x_content">
                <div class="row top_tiles" >
<<<<<<< HEAD
					<div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 130px;">
	                    <div class="img-portadas-libro">
	                      <img id="img-portada-libro" src="../images/book1.jpg" width="80" height="110">
	                    </div>
	                    <div class="tile-stats" style="top: 15px;">
	                      <div><a class="count2" id="a-titulo-libro" href="libro.php?c=<?php echo $fila['codigo_libro'] ?>"> <?php echo $fila['titulo_libro'] ?></a></div>
	                      <ul class="stats-overview info-libro">
	                        <li>
	                          <span class="value" id="span-autor-libro">
	                          	<?php
	                          		$sql2 = sprintf("SELECT d.nombre, d.apellido
=======
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
>>>>>>> origin/master
													FROM tbl_autores_x_libros c
													INNER JOIN tbl_autores d
													ON c.codigo_autor = d.codigo_autor
													WHERE c.codigo_libro = '%s'",
													$fila['codigo_libro']
									);
									$resultado2 = $conexion->ejecutarInstruccion($sql2);
									$strAutores = "";
									while($fila2 = $conexion->obtenerFila($resultado2)){
										$strAutores .= $fila2['nombre']." ".$fila2['apellido'].", ";
									}
									echo substr($strAutores, 0, -2);
	                          	?>
	                          </span>
	                        </li>
	                        <li>
	                          <span class="value" id="span-editorial-libro">Editorial</span>
	                        </li>
	                        <li>
	                          <span class="value" id="span-año-publicacion-libro">Año de publicación</span>
	                        </li>
	                      </ul>
	                    </div>
		            </div>
		        </div>
            </div>
            <?php
<<<<<<< HEAD
        	}
=======
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

			
>>>>>>> origin/master
		}
	}
?>