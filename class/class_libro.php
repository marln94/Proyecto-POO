<?php
	
	session_start();
	
	class Libro{

		private $codigoLibro;
		private $codigoTipoLibro;
		private $codigoEditorial;
		private $anioPublicacion;
		private $codigoColeccion;
		private $codigoDisponibilidad;
		private $edicion;
		private $tituloLibro;
		private $cantidadLibros;
		private $descripcionFisica;
		private $ISBN;
		private $ubicacionLibro;
		private $urlImagenLibro;
		private $urlImagenCodigoQR;
		private $libroPDF;

		public function __construct($codigoLibro,
					$codigoTipoLibro,
					$codigoEditorial,
					$anioPublicacion,
					$codigoColeccion,
					$codigoDisponibilidad,
					$edicion,
					$tituloLibro,
					$cantidadLibros,
					$descripcionFisica,
					$ISBN,
					$ubicacionLibro,
					$urlImagenLibro,
					$urlImagenCodigoQR,
					$libroPDF){
			$this->codigoLibro = $codigoLibro;
			$this->codigoTipoLibro = $codigoTipoLibro;
			$this->codigoEditorial = $codigoEditorial;
			$this->anioPublicacion = $anioPublicacion;
			$this->codigoColeccion = $codigoColeccion;
			$this->codigoDisponibilidad = $codigoDisponibilidad;
			$this->edicion = $edicion;
			$this->tituloLibro = $tituloLibro;
			$this->cantidadLibros = $cantidadLibros;
			$this->descripcionFisica = $descripcionFisica;
			$this->ISBN = $ISBN;
			$this->ubicacionLibro = $ubicacionLibro;
			$this->urlImagenLibro = $urlImagenLibro;
			$this->urlImagenCodigoQR = $urlImagenCodigoQR;
			$this->libroPDF = $libroPDF;
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
		public function getAnioPublicacion(){
			return $this->anioPublicacion;
		}
		public function setAnioPublicacion($anioPublicacion){
			$this->anioPublicacion = $anioPublicacion;
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
		public function getUbicacionLibro(){
			return $this->ubicacionLibro;
		}
		public function setUbicacionLibro($ubicacionLibro){
			$this->ubicacionLibro = $ubicacionLibro;
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
		public function getLibroPDF(){
			return $this->libroPDF;
		}
		public function setLibroPDF($libroPDF){
			$this->libroPDF = $libroPDF;
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
				WHERE a.codigo_libro = '%s' AND a.estado=1",
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
			            	if($codigoTipoUsuario > 0){
		                	$solicitar = "";
		                	$leer = "";
		                	if($fila1['codigo_disponibilidad']==1 && $fila1['codigo_tipo_libro']==1){
		                		$leer = "disabled";
		                	}
		                	if($fila1['codigo_disponibilidad']==1 && $fila1['codigo_tipo_libro']==2){
		                		$leer = 'onclick="mostrarPDF('.$fila1["codigo_libro"].')"';
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
			            <?php
			            	} else{
			            ?>
			            	<button class="btn btn-default" id="btn-solicitar" disabled >Solicitar libro</button>
			                <button class="btn btn-default" id="leer-digital" disabled>Leer en digital</button>
			            <?php

			            	}
			            ?>
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
													WHERE c.codigo_libro = '%s' AND d.estado=1",
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

		public static function listadoLibros($conexion){
			$sql = "SELECT a.codigo_libro, b.nombre_tipo_libro, 
						c.nombre_editorial, d.anio_publicacion, 
						e.nombre_coleccion, f.nombre_disponibilidad, 
						a.edicion, a.titulo_libro, 
						a.ejemplares, a.descripcion_fisica, 
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
				WHERE a.estado=1";
			$resultado = $conexion->ejecutarInstruccion($sql);
			?>

			<table class="table table-striped">
            	<thead> 
            		<th>Código</th>
                    <th>Título</th>
                    <th>Autor(es)</th>
                    <th>Editorial</th>
                    <th>Año</th>
                    <th>Tipo</th>
                    <th>Ejemplares</th>
                    <th>Categoría</th>
                    <th>Colección</th>
                    <th>Sucursal(es)</th>
	            </thead>
	        <?php
			while($fila1 = $conexion->obtenerFila($resultado)){
			?>
              	<tr>
                	<td><?php echo $fila1['codigo_libro']?></td>
                	<td><?php echo $fila1['titulo_libro']?></td>
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
                	<td><?php echo $fila1['nombre_editorial']?></td>
	                <td><?php echo $fila1['anio_publicacion']?></td>
	                <td><?php echo $fila1['nombre_tipo_libro']?></td>
                	<td><?php echo $fila1['ejemplares']?></td>
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
                      	?></td>
                	<td><?php echo $fila1['nombre_coleccion']?></td>
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
            <?php
        	}
        	?>
        	</table>
        	<?php
		}

		public static function datosRegistroLibro($conexion){
			$autores = "";
			$editoriales = "";
			$categorias = "";
			$sucursales = "";
			$colecciones = "";

			$sql = "SELECT codigo_autor, nombre, apellido
					FROM tbl_autores
					WHERE estado=1";
			$resultado = $conexion->ejecutarInstruccion($sql);
			while ($fila = $conexion->obtenerFila($resultado)) {
				$autores .= '<option value="'.$fila["codigo_autor"].'">'.$fila["nombre"]." ".$fila["apellido"].'</option>';
			}
			$sql = "SELECT codigo_editorial, nombre_editorial
					FROM tbl_editoriales
					WHERE estado=1";
			$resultado = $conexion->ejecutarInstruccion($sql);
			$editoriales .= '<option></option>';
			while ($fila = $conexion->obtenerFila($resultado)) {
				$editoriales .= '<option value="'.$fila["codigo_editorial"].'">'.$fila["nombre_editorial"].'</option>';
			}
			$sql = "SELECT codigo_categoria, nombre_categoria
					FROM tbl_categorias
					WHERE estado=1";
			$resultado = $conexion->ejecutarInstruccion($sql);
			while ($fila = $conexion->obtenerFila($resultado)) {
				$categorias .= '<option value="'.$fila["codigo_categoria"].'">'.$fila["nombre_categoria"].'</option>';
			}
			$sql = "SELECT codigo_sucursal, direccion_sucursal
					FROM tbl_sucursales
					WHERE estado=1";
			$resultado = $conexion->ejecutarInstruccion($sql);
			while ($fila = $conexion->obtenerFila($resultado)) {
				$sucursales .= '<option value="'.$fila["codigo_sucursal"].'">'.$fila["direccion_sucursal"].'</option>';
			}
			$sql = "SELECT codigo_coleccion, nombre_coleccion
					FROM tbl_colecciones
					WHERE estado=1";
			$resultado = $conexion->ejecutarInstruccion($sql);
			$colecciones .= '<option></option>';
			while ($fila = $conexion->obtenerFila($resultado)) {
				$colecciones .= '<option value="'.$fila["codigo_coleccion"].'">'.$fila["nombre_coleccion"].'</option>';
			}
			$respuesta["autores"] = $autores;
			$respuesta["editoriales"] = $editoriales;
			$respuesta["categorias"] = $categorias;
			$respuesta["sucursales"] = $sucursales;
			$respuesta["colecciones"] = $colecciones;
			echo json_encode($respuesta);
		}

		public function guardarRegistro($conexion){
			$sql = sprintf("
				SELECT codigo_anio_publicacion
				FROM tbl_anios_publicaciones
				WHERE anio_publicacion = '%s'",
				$this->anioPublicacion
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			if($conexion->cantidadRegistros($resultado) > 0){
				$fila = $conexion->obtenerFila($resultado);
				$codigoAnioPublicacion = $fila["codigo_anio_publicacion"];
			} else{
				$sql = sprintf("
					INSERT INTO tbl_anios_publicaciones(codigo_anio_publicacion,anio_publicacion)
					VALUES (NULL,'%s')",
					$this->anioPublicacion
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
				$codigoAnioPublicacion = $conexion->ultimoId();
			}
			if($this->codigoTipoLibro == 1){
				$sql = sprintf("
					INSERT INTO tbl_libros(
									codigo_libro, codigo_tipo_libro, 
									codigo_editorial, codigo_anio_publicacion, 
									codigo_coleccion, codigo_disponibilidad, 
									edicion, titulo_libro, 
									cantidad_libros, ejemplares, 
									descripcion_fisica, ISBN, 
									ubicacion_libro, 
									url_imagen_libro, url_imagen_codigo_qr, libro_pdf,estado) 
					VALUES (NULL,'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',NULL,NULL,NULL,1)",
					$this->codigoTipoLibro,
					$this->codigoEditorial,
					$codigoAnioPublicacion,
					$this->codigoColeccion,
					$this->codigoDisponibilidad,
					$this->edicion,
					$this->tituloLibro,
					$this->cantidadLibros,
					$this->cantidadLibros,
					$this->descripcionFisica,
					$this->ISBN,
					$this->ubicacionLibro
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
				
			} else{
				$sql = sprintf("
					INSERT INTO tbl_libros(
									codigo_libro, codigo_tipo_libro, 
									codigo_editorial, codigo_anio_publicacion, 
									codigo_coleccion, codigo_disponibilidad, 
									edicion, titulo_libro, 
									cantidad_libros, ejemplares, 
									descripcion_fisica, ISBN, 
									ubicacion_libro, 
									url_imagen_libro, url_imagen_codigo_qr, 
									libro_pdf, estado) 
					VALUES (NULL,'%s','%s','%s','%s','%s','%s','%s',NULL,NULL,NULL,'%s',NULL,NULL,NULL,NULL,1)",
					$this->codigoTipoLibro,
					$this->codigoEditorial,
					$codigoAnioPublicacion,
					$this->codigoColeccion,
					$this->codigoDisponibilidad,
					$this->edicion,
					$this->tituloLibro,
					$this->ISBN
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
				
			}
			
		}

		public static function guardarRegistro2($conexion,$autores,$categorias,$sucursales,$urlImagenCodigoQR,$codigoLibro){
			for ($i=0; $i < count($autores); $i++) { 
				$sql = sprintf("
					INSERT INTO tbl_autores_x_libros(
						codigo_libro,codigo_autor)
					VALUES ('%s','%s')",
					$codigoLibro,
					$autores[$i]
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
			}
			for ($i=0; $i < count($categorias); $i++) { 
				$sql = sprintf("
					INSERT INTO tbl_categorias_x_libros(
						codigo_libro,codigo_categoria)
					VALUES ('%s','%s')",
					$codigoLibro,
					$categorias[$i]
				);
				$resultado = $conexion->ejecutarInstruccion($sql);

				$sql = sprintf("
					UPDATE tbl_categorias
					SET cantidad_libros=cantidad_libros+1
					WHERE codigo_categoria='%s'",
					$categorias[$i]
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
			}
			for ($i=0; $i < count($sucursales); $i++) { 
				$sql = sprintf("
					INSERT INTO tbl_libros_x_sucursales(
						codigo_libro,codigo_sucursal)
					VALUES ('%s','%s')",
					$codigoLibro,
					$sucursales[$i]
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
			}
			$sql = sprintf("
				UPDATE tbl_libros
				SET url_imagen_codigo_qr='%s'
				WHERE codigo_libro='%s'",
				$urlImagenCodigoQR,
				$codigoLibro
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
		}

		public static function guardarImagen($conexion,$urlImagenLibro,$codigoLibro){
			$sql = sprintf("
				UPDATE tbl_libros
				SET url_imagen_libro='%s'
				WHERE codigo_libro='%s'",
				$urlImagenLibro,
				$codigoLibro
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
		}
		public static function guardarPDF($conexion,$urlLibroPDF,$codigoLibro){
			$sql = sprintf("
				UPDATE tbl_libros
				SET libro_pdf='%s'
				WHERE codigo_libro='%s'",
				$urlLibroPDF,
				$codigoLibro
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
		}

		public static function retirarLibro($conexion,$codigoLibro){
			$sql = sprintf("
				SELECT visible
				FROM tbl_prestamos
				WHERE codigo_libro = '%s'",
				$codigoLibro
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			$eliminar = true;
			while ($fila = $conexion->obtenerFila($resultado)) {
				if($fila["visible"] == 1){
					$eliminar = false;
					break;
				}
			}
			if($eliminar){
				$sql = sprintf("
					SELECT estado,codigo_coleccion
					FROM tbl_libros
					WHERE codigo_libro='%s'",
					$codigoLibro
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
				$fila = $conexion->obtenerFila($resultado);
				if($fila["estado"] == 1){
					$sql = sprintf("
						UPDATE tbl_libros
						SET estado='%s'
						WHERE codigo_libro='%s' AND estado=1",
						0,
						$codigoLibro
					);
					$resultado = $conexion->ejecutarInstruccion($sql);
					$sql = sprintf("
						SELECT codigo_categoria
						FROM tbl_categorias_x_libros
						WHERE codigo_libro='%s'",
						$codigoLibro
					);
					$resultado = $conexion->ejecutarInstruccion($sql);
					$fila2 = $conexion->obtenerFila($resultado);

					$sql = sprintf("
						UPDATE tbl_categorias
						SET cantidad_libros=cantidad_libros-1
						WHERE codigo_categoria='%s'",
						$fila2["codigo_categoria"]
					);
					$resultado = $conexion->ejecutarInstruccion($sql);
					$sql = sprintf("
						UPDATE tbl_colecciones
						SET cantidad_libros=cantidad_libros-1
						WHERE codigo_coleccion='%s'",
						$fila["codigo_coleccion"]
					);
					$resultado = $conexion->ejecutarInstruccion($sql);
				} else{
					echo "error";
				}
			}else{
				echo "error";
			}
		}

		public static function busquedaLibros($conexion, $query){
			?>
			<!-- Resultados-->
			<div class="x_title">
                <h3>Resultados</h3>
                <div class="clearfix"></div>
            </div>
			<?php
			$sql1 = "SELECT titulo_libro,codigo_libro,url_imagen_libro  FROM tbl_libros";
			$resultado1 = $conexion->ejecutarInstruccion($sql1);
			while($fila = $conexion->obtenerFila($resultado1)){
				if(stripos(removeAccents($fila["titulo_libro"]), removeAccents($query)) !== false){
			?>
			<!-- Libros que contiene la busqueda -->
            <div class="x_content">
                <div class="row top_tiles" >
					<div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 130px;">
	                    <div class="img-portadas-libro">
	                    	<?php
	                    		if(!empty($fila['url_imagen_libro'])){
	                    	?>
	                      	<img id="img-portada-libro" src="../upload/<?php echo $fila['url_imagen_libro'] ?>" width="80" height="110">
	                      	<?php
	                      		} else{
	                      	?>
	                      	<img id="img-portada-libro" src="../upload/portadas/no-disponible.png" width="80" height="110">
	                      	<?php
	                      		}
	                      	?>
	                    </div>
	                    <div class="tile-stats" style="top: 15px;">
	                      <div><a class="count2" id="a-titulo-libro" href="libro.php?c=<?php echo $fila['codigo_libro'] ?>"> <?php echo $fila['titulo_libro'] ?></a></div>
	                      	<ul class="stats-overview info-libro">
	                        	<li>
	                          		<span class="value" id="span-autor-libro">
			                          	<?php
											$resultado2 = $conexion->ejecutarInstruccion(
												sprintf("SELECT d.nombre, d.apellido
														FROM tbl_autores_x_libros c
														INNER JOIN tbl_autores d
														ON c.codigo_autor = d.codigo_autor
														WHERE c.codigo_libro = '%s' AND d.estado=1",
														$fila['codigo_libro']
												)
											);
											$strAutores = "";
											while($fila2 = $conexion->obtenerFila($resultado2)){
												$strAutores .= $fila2['nombre']." ".$fila2['apellido'].", ";
											}
											echo substr($strAutores, 0, -2);
											$conexion->liberarResultado($resultado2);
			                          	?>
	                          		</span>
	                        	</li>
	                        	<li>
	                          		<span class="value" id="span-editorial-libro">
			                          	<?php
				                          	$resultado2 = $conexion->ejecutarInstruccion(
				                          		sprintf("SELECT f.nombre_editorial
				                          				FROM tbl_libros e
				                          				INNER JOIN tbl_editoriales f
				                          				ON e.codigo_editorial = f.codigo_editorial
				                          				WHERE e.codigo_libro = '%s'",
				                          				$fila['codigo_libro']
				                          		)
				                          	);
				                          	$fila2 = $conexion->obtenerFila($resultado2);
				                          	echo $fila2['nombre_editorial'];
				                        ?>
	                          		</span>
	                        	</li>
	                        	<li>
	                          		<span class="value" id="span-año-publicacion-libro">
			                          	<?php
				                          	$resultado2 = $conexion->ejecutarInstruccion(
				                          		sprintf("SELECT g.anio_publicacion
				                          				FROM tbl_libros e
				                          				INNER JOIN tbl_anios_publicaciones g
				                          				ON e.codigo_anio_publicacion = g.codigo_anio_publicacion
				                          				WHERE e.codigo_libro = '%s'",
				                          				$fila['codigo_libro']
				                          		)
				                          	);
				                          	$fila2 = $conexion->obtenerFila($resultado2);
				                          	echo $fila2['anio_publicacion'];
				                        ?>
	                          		</span>
	                        	</li>
	                      	</ul>
	                    </div>
		            </div>
		        </div>
            </div>
            <?php
            	} else{
            		?>
            <div class="x_content">
                <div class="row top_tiles" >
					<div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 130px;">
					<p>No hay resultados que coincidan con la búsqueda.</p>
					</div>
				</div>
			</div>
            		<?php
            	}
        	}
		}

		public static function obtenerPDF($conexion,$codigoLibro){
			$sql = sprintf("
				SELECT libro_pdf
				FROM tbl_libros
				WHERE codigo_libro='%s'",
				$codigoLibro
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			$fila = $conexion->obtenerFila($resultado);
			?>
			<iframe src="<?php echo $fila['libro_pdf'] ?>" style="width: 100%;height: 768px;" ></iframe>
			<?php
		}
	}
	function removeAccents($string) {
		    return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', preg_replace('~&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'))), ' '));
		}
?>