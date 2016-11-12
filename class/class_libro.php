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
        	}
		}
	}
?>