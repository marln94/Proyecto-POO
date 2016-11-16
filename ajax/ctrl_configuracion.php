<?php
	switch ($_GET["accion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_usuario.php");
			$conexion = new Conexion();
			$fila = Usuario::informacionUsuario($conexion,$_POST["codigo-usuario"]);
			echo json_encode($fila);
			break;
		case '2':
			include_once("../class/class_conexion.php");
			include_once("../class/class_usuario.php");
			$conexion = new Conexion();
			Usuario::actualizarNombre($conexion,$_POST["codigo-usuario"],$_POST["nuevo-valor"]);
			break;

		case '3':
			include_once("../class/class_conexion.php");
			include_once("../class/class_usuario.php");
			$conexion = new Conexion();
			Usuario::actualizarApellido($conexion,$_POST["codigo-usuario"],$_POST["nuevo-valor"]);
			break;

		case '4':
			include_once("../class/class_conexion.php");
			include_once("../class/class_usuario.php");
			$conexion = new Conexion();
			Usuario::actualizarCorreoElectronico($conexion,$_POST["codigo-usuario"],$_POST["nuevo-valor"]);
			break;

		case '5':
			include_once("../class/class_conexion.php");
			include_once("../class/class_usuario.php");
			$conexion = new Conexion();
			Usuario::actualizarContraseña($conexion,$_POST["codigo-usuario"],$_POST["nuevo-valor"],$_POST["valor-actual"]);
			break;
		
		default:
			# code...
			break;
	}
?>