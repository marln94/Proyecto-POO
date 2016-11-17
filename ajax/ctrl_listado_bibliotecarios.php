<?php
	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_usuario.php");
			$conexion = new Conexion();
			Usuario::listadoBibliotecarios($conexion);
			break;
		
		default:
			# code...
			break;
	}
?>