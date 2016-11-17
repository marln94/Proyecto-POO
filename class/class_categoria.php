<?php

	class Categoria{

		private $codigoCategoria;
		private $nombreCategoria;
		private $cantidadLibros;
		private $urlImagenCategoria;
		private $estado;

		public function __construct($codigoCategoria,
					$nombreCategoria,
					$cantidadLibros,
					$urlImagenCategoria,
					$estado){
			$this->codigoCategoria = $codigoCategoria;
			$this->nombreCategoria = $nombreCategoria;
			$this->cantidadLibros = $cantidadLibros;
			$this->urlImagenCategoria = $urlImagenCategoria;
			$this->estado = $estado;
		}
		public function getCodigoCategoria(){
			return $this->codigoCategoria;
		}
		public function setCodigoCategoria($codigoCategoria){
			$this->codigoCategoria = $codigoCategoria;
		}
		public function getNombreCategoria(){
			return $this->nombreCategoria;
		}
		public function setNombreCategoria($nombreCategoria){
			$this->nombreCategoria = $nombreCategoria;
		}
		public function getCantidadLibros(){
			return $this->cantidadLibros;
		}
		public function setCantidadLibros($cantidadLibros){
			$this->cantidadLibros = $cantidadLibros;
		}
		public function getUrlImagenCategoria(){
			return $this->urlImagenCategoria;
		}
		public function setUrlImagenCategoria($urlImagenCategoria){
			$this->urlImagenCategoria = $urlImagenCategoria;
		}
		public function getEstado(){
			return $this->estado;
		}
		public function setEstado($estado){
			$this->estado = $estado;
		}

		/** parámetro "fuera" para acceder desde otras carpetas a la carpeta de imágenes **/
		/** parámetro "formulario" para acceder desde la misma carpeta al formulario categoria.php **/
		public static function cargarCategorias($conexion, $fuera, $formulario){
			$resultado = $conexion->ejecutarInstruccion("
				SELECT codigo_categoria, nombre_categoria, 
						cantidad_libros, url_imagen_categoria 
				FROM tbl_categorias
				WHERE estado=1");
			while($fila = $conexion->obtenerFila($resultado)){
			?>
				<div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12" style="height: 110px;">
				    <div class="img-portadas">
				      	<img id="slider" src="<?php echo $fuera.$fila['url_imagen_categoria']?>" width="70" height="100">
				    </div>
				    <div class="tile-stats" style="top: 15px;">
					    <div class="count"><?php echo $fila['cantidad_libros'] ?></div>
					    <h3><a href="<?php echo $formulario.'categoria.php?c='.$fila['codigo_categoria']?>" class="btn btn2"><?php echo $fila['nombre_categoria'] ?></a>
				    </div>
				</div>
			<?php
			}
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
							WHERE a.codigo_categoria = '%s' AND b.estado=1",
							$codigoCategoria
			);
			$resultado1 = $conexion->ejecutarInstruccion($sql1);
			while($fila = $conexion->obtenerFila($resultado1)){
			?>
			<!-- Libros que contiene la categoría -->
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
        	}
		}

		public static function listadoCategorias($conexion){
			$sql = sprintf("
				SELECT codigo_categoria,nombre_categoria,cantidad_libros
				FROM tbl_categorias
				WHERE estado=1"
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			while($fila = $conexion->obtenerFila($resultado)){
			?>
			<tr>
	            <td><?php echo $fila["codigo_categoria"] ?></td>
	            <td><?php echo $fila["nombre_categoria"] ?></td>
	            <td><?php echo $fila["cantidad_libros"] ?></td>
	        </tr>
			<?php
			}
		}

		public function guardarRegistro($conexion){
			$sql = sprintf("
				INSERT INTO tbl_categorias(codigo_categoria,nombre_categoria,cantidad_libros,estado)
				VALUES (NULL,'%s','%s','%s')",
				$conexion->escaparCaracteres($this->nombreCategoria),
				$conexion->escaparCaracteres($this->cantidadLibros),
				$conexion->escaparCaracteres($this->estado)
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
		}

		public function guardarImagen($conexion,$urlImagenCategoria,$codigoCategoria){
			$sql = sprintf("
				UPDATE tbl_categorias
				SET url_imagen_categoria='%s'
				WHERE codigo_categoria='%s'",
				substr($urlImagenCategoria,3),
				$codigoCategoria
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
		}

		public static function retirarCategoria($conexion,$codigoCategoria){
			$sql = sprintf("
				SELECT b.estado
				FROM tbl_categorias_x_libros a
				INNER JOIN tbl_libros b
					ON a.codigo_libro=b.codigo_libro
				WHERE a.codigo_categoria='%s'",
				$codigoCategoria
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
					FROM tbl_categorias
					WHERE codigo_categoria='%s'",
					$codigoCategoria
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
				$fila = $conexion->obtenerFila($resultado);
				if($fila["estado"] == 1){
					$sql = sprintf("
						UPDATE tbl_categorias
						SET estado='%s'
						WHERE codigo_categoria='%s'",
						0,
						$codigoCategoria
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