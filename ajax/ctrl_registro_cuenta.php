<?php 
	switch ($_GET["accion"]) {
		case '1':
			if($_POST["txt-nombre"] == ""){
				echo "error";
				break;}
			if($_POST["txt-apellido"] == ""){
				echo "error";
				break;}
			if($_POST["txt-email"] == ""){
				echo "error";
				break;}
			if($_POST["txt-contraseña"] == ""){
				echo "error";
				break;}

			include_once("../class/class_conexion.php");
			include_once("../class/class_usuario.php");
			include_once("../class/class_tipo_usuario.php");
			
			$conexion = new Conexion();

			$usuario = new Usuario(NULL,
				new TipoUsuario(3, "Registrado"),
				$_POST["txt-nombre"],
				$_POST["txt-apellido"],
				$_POST["txt-email"],
				$_POST["txt-contraseña"],
				NULL,
				NULL,
				NULL);
			$usuario->guardarRegistro($conexion);
			$conexion->cerrarConexion();
			echo "Registro guardado!";
			break;
		
		default:
			# code...
			break;
	}
?>