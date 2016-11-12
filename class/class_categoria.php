<?php

	class Categoria{

		private $codigoCategoria;
		private $nombreCategoria;
		private $cantidadLibros;
		private $urlImagenCategoria;

		public function __construct($codigoCategoria,
					$nombreCategoria,
					$cantidadLibros,
					$urlImagenCategoria){
			$this->codigoCategoria = $codigoCategoria;
			$this->nombreCategoria = $nombreCategoria;
			$this->cantidadLibros = $cantidadLibros;
			$this->urlImagenCategoria = $urlImagenCategoria;
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

		/** parámetro "fuera" para acceder desde otras carpetas a la carpeta de imágenes **/
		/** parámetro "formulario" para acceder desde la misma carpeta al formulario categoria.php **/
		public static function cargarCategorias($conexion, $fuera, $formulario){
			$resultado = $conexion->ejecutarInstruccion("
				SELECT codigo_categoria, nombre_categoria, 
						cantidad_libros, url_imagen_categoria 
				FROM tbl_categorias");
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
	}
?>