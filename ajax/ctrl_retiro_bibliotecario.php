<?php
	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_usuario.php");
			$conexion = new Conexion();
			Usuario::eliminarCuenta($conexion,$_POST["txt-codigo-bibliotecario"]);
			break;
		
		default:
			# code...
			break;
	}
?>