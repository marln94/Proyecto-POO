<?php 

	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_coleccion.php");
			$conexion = new Conexion();
			$coleccion = new Coleccion(NULL,$_POST["txt-nombre-coleccion"],1);
			$coleccion->guardarRegistro($conexion);
			break;
		
		default:
			# code...
			break;
	}
?>