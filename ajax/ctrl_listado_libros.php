<?php
	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_libro.php");
			$conexion = new Conexion();
			Libro::listadoLibros($conexion);
			break;

		default:
			# code...
			break;
	}
?>