<?php
	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_libro.php");
			$conexion = new Conexion();
			Libro::retirarLibro($conexion,$_POST["txt-codigo-libro"]);
			break;
		
		default:
			# code...
			break;
	}
?>