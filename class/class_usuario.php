<?php
	include_once("class_tipo_usuario.php");

	class usuario{

		private $codigoUsuario;
		private $tipoUsuario;
		private $nombre;
		private $apellido;
		private $correoElectronico;
		private $contraseña;
		private $domicilio;
		private $telefono;
		private $imagenUsuario;
		private $tipoImagen;
		private $estadoUsuario;

		public function __construct($codigoUsuario,
					$tipoUsuario,
					$nombre,
					$apellido,
					$correoElectronico,
					$contraseña,
					$domicilio,
					$telefono,
					$imagenUsuario,
					$tipoImagen,
					$estadoUsuario){
			$this->codigoUsuario = $codigoUsuario;
			$this->tipoUsuario = $tipoUsuario;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->correoElectronico = $correoElectronico;
			$this->contraseña = $contraseña;
			$this->domicilio = $domicilio;
			$this->telefono = $telefono;
			$this->imagenUsuario = $imagenUsuario;
			$this->tipoImagen = $tipoImagen;
			$this->estadoUsuario = $estadoUsuario;
		}
		public function getCodigoUsuario(){
			return $this->codigoUsuario;
		}
		public function setCodigoUsuario($codigoUsuario){
			$this->codigoUsuario = $codigoUsuario;
		}
		public function getTipoUsuario(){
			return $this->tipoUsuario;
		}
		public function setTipoUsuario($tipoUsuario){
			$this->tipoUsuario = $tipoUsuario;
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
		public function getCorreoElectronico(){
			return $this->correoElectronico;
		}
		public function setCorreoElectronico($correoElectronico){
			$this->correoElectronico = $correoElectronico;
		}
		public function getContraseña(){
			return $this->contraseña;
		}
		public function setContraseña($contraseña){
			$this->contraseña = $contraseña;
		}
		public function getDomicilio(){
			return $this->domicilio;
		}
		public function setDomicilio($domicilio){
			$this->domicilio = $domicilio;
		}
		public function getTelefono(){
			return $this->telefono;
		}
		public function setTelefono($telefono){
			$this->telefono = $telefono;
		}
		public function getImagenUsuario(){
			return $this->imagenUsuario;
		}
		public function setImagenUsuario($imagenUsuario){
			$this->imagenUsuario = $imagenUsuario;
		}
		public function getTipoImagen(){
			return $this->tipoImagen;
		}
		public function setTipoImagen($tipoImagen){
			$this->tipoImagen = $tipoImagen;
		}
		public function getEstadoUsuario(){
			return $this->estadoUsuario;
		}
		public function setEstadoUsuario($estadoUsuario){
			$this->estadoUsuario = $estadoUsuario;
		}

		public function guardarRegistro($conexion){
			$sql = sprintf(
				"INSERT INTO tbl_usuarios(
						codigo_usuario, 
						codigo_tipo_usuario, 
						nombre, 
						apellido, 
						correo_electronico,
						contrasena, 
						domicilio, 
						telefono, 
						imagen_usuario,
						tipo_imagen,
						estado_usuario
					) VALUES (
					NULL, %s, '%s', '%s', '%s', sha1('%s'), '%s', '%s', '%s', '%s','%s'
				)",
				$conexion->escaparCaracteres($this->tipoUsuario->getCodigoTipoUsuario()),
				$conexion->escaparCaracteres($this->nombre),
				$conexion->escaparCaracteres($this->apellido),
				$conexion->escaparCaracteres($this->correoElectronico),
				$conexion->escaparCaracteres($this->contraseña),
				$conexion->escaparCaracteres($this->domicilio),
				$conexion->escaparCaracteres($this->telefono),
				$conexion->escaparCaracteres($this->imagenUsuario),
				$conexion->escaparCaracteres($this->tipoImagen),
				$conexion->escaparCaracteres($this->estadoUsuario)
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
		}

		public static function verificarUsuario($conexion,$correoElectronico,$contrasena){
			$sql = sprintf("
				SELECT codigo_usuario, codigo_tipo_usuario, nombre, apellido
				FROM tbl_usuarios 
				WHERE correo_electronico='%s' AND contrasena=sha1('%s') AND estado_usuario=1",
				stripslashes($correoElectronico),
				stripslashes($contrasena)
			);

			$resultado = $conexion->ejecutarInstruccion($sql);
			
			if($conexion->cantidadRegistros($resultado) > 0){
				return $conexion->obtenerFila($resultado);
			} else{
				return false;
			}
		}

		public static function informacionUsuario($conexion,$codigoUsuario){
			$sql = sprintf("
				SELECT nombre, apellido, correo_electronico, contrasena
				FROM tbl_usuarios 
				WHERE codigo_usuario='%s' AND estado_usuario=1",
				$codigoUsuario
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			return $conexion->obtenerFila($resultado);
		}

		public static function actualizarNombre($conexion,$codigoUsuario,$nuevoValor){
			$sql = sprintf("
				UPDATE tbl_usuarios
				SET nombre='%s'
				WHERE codigo_usuario='%s'",
				$nuevoValor,
				$codigoUsuario
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			if($resultado){
				echo "Nombre actualizado correctamente";
			} else{
				echo "Error en la actualización del nombre";
			}
			return $nuevoValor;
		}
		public static function actualizarApellido($conexion,$codigoUsuario,$nuevoValor){
			$sql = sprintf("
				UPDATE tbl_usuarios
				SET apellido='%s'
				WHERE codigo_usuario='%s'",
				$nuevoValor,
				$codigoUsuario
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			if($resultado){
				echo "Apellido actualizado correctamente";
			} else{
				echo "Error en la actualización del apellido";
			}
			return $nuevoValor;
		}
		public static function actualizarCorreoElectronico($conexion,$codigoUsuario,$nuevoValor){
			$sql = sprintf("
				UPDATE tbl_usuarios
				SET correo_electronico='%s'
				WHERE codigo_usuario='%s'",
				$nuevoValor,
				$codigoUsuario
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			if($resultado){
				echo "Correo electrónico actualizado correctamente";
			} else{
				echo "Error en la actualización del correo electrónico";
			}
		}
		public static function actualizarContraseña($conexion,$codigoUsuario,$nuevoValor,$valorActual){
			$sql = sprintf("
				SELECT contrasena
				FROM tbl_usuarios
				WHERE codigo_usuario='%s'",
				$codigoUsuario
			);
			$resultado = $conexion->ejecutarInstruccion($sql);
			$fila = $conexion->obtenerFila($resultado);

			if($fila["contrasena"] == sha1($valorActual)){
				$sql = sprintf("
					UPDATE tbl_usuarios
					SET contrasena=sha1('%s')
					WHERE codigo_usuario='%s' AND contrasena=sha1('%s')",
					$nuevoValor,
					$codigoUsuario,
					$valorActual
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
			} else{
				echo "error";
			}
		}

		public static function eliminarCuenta($conexion,$codigoUsuario){
			$sql = sprintf("
				SELECT visible
				FROM tbl_prestamos
				WHERE codigo_usuario='%s'",
				$codigoUsuario
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
					UPDATE tbl_usuarios
					SET estado_usuario=0
					WHERE codigo_usuario='%s'",
					$codigoUsuario
				);
				$resultado = $conexion->ejecutarInstruccion($sql);
				if(!$resultado){
					echo "error";
				}
			} else{
				echo "pendiente";
			}
		}

		public static function listadoBibliotecarios($conexion){
			$sql = "
				SELECT nombre,apellido,correo_electronico,telefono, imagen_usuario,codigo_usuario
				FROM tbl_usuarios
				WHERE codigo_tipo_usuario=2 AND estado_usuario=1";
			$resultado = $conexion->ejecutarInstruccion($sql);

			while ($fila = $conexion->obtenerFila($resultado)) {
				if($fila["imagen_usuario"] == NULL){
					$imagen = "../images/user.png";
				} else{
					$imagen = "../php/imagen.php?id=".$fila["codigo_usuario"];
				}
			?>
			<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                <div class="well profile_view">
                  <div class="col-sm-12">
                    <h4 class="brief"><i>Bibliotecario</i></h4>
                    <div class="left col-xs-7">
                      <h2 id="nombre-bibliotecario"><?php echo $fila["nombre"]." ".$fila["apellido"] ?></h2>
                      <ul class="list-unstyled">
                      	<li><i class="fa fa-user"></i> Código: <strong><?php echo $fila["codigo_usuario"] ?></strong></li>
                        <li><i class="fa fa-envelope"></i> Correo: <strong><?php echo $fila["correo_electronico"] ?></strong></li>
                        <li><i class="fa fa-phone"></i> Teléfono: <strong><?php echo $fila["telefono"] ?></strong></li>
                      </ul>
                    </div>
                    <div class="right col-xs-5 text-center">
                      <img src="<?php echo $imagen ?>" alt="" class="img-circle img-responsive">
                    </div>
                  </div>
                </div>
            </div>
			<?php	
			}
		}

		public static function listadoUsuarios($conexion){
			$sql = "
				SELECT nombre,apellido,correo_electronico,imagen_usuario,codigo_usuario
				FROM tbl_usuarios
				WHERE codigo_tipo_usuario=3 AND estado_usuario=1";
			$resultado = $conexion->ejecutarInstruccion($sql);

			while ($fila = $conexion->obtenerFila($resultado)) {
				if($fila["imagen_usuario"] == NULL){
					$imagen = "../images/user.png";
				} else{
					$imagen = "../php/imagen.php?id=".$fila["codigo_usuario"];
				}
			?>
			<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                <div class="well profile_view">
                  <div class="col-sm-12">
                    <h4 class="brief"><i>Bibliotecario</i></h4>
                    <div class="left col-xs-7">
                      <h2 id="nombre-bibliotecario"><?php echo $fila["nombre"]." ".$fila["apellido"] ?></h2>
                      <ul class="list-unstyled">
                      	<li><i class="fa fa-user"></i> Código: <strong><?php echo $fila["codigo_usuario"] ?></strong></li>
                        <li><i class="fa fa-envelope"></i> Correo: <strong><?php echo $fila["correo_electronico"] ?></strong></li>
                      </ul>
                    </div>
                    <div class="right col-xs-5 text-center">
                      <img src="<?php echo $imagen ?>" alt="" class="img-circle img-responsive">
                    </div>
                  </div>
                </div>
            </div>
			<?php	
			}
		}
	}
?>