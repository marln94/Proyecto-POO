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
			if($_POST["txt-nombre-usuario"] == ""){
				echo "error";
				break;}
			if($_POST["txt-contraseña"] == ""){
				echo "error";
				break;}

			include_once("../class/class_conexion.php");
			include_once("../class/class_usuario.php");
			
			$conexion = new Conexion();

			$usuario = new Usuario(NULL,
				3,
				$_POST["txt-nombre"],
				$_POST["txt-apellido"],
				$_POST["txt-email"],
				$_POST["txt-nombre-usuario"],
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