<?php
	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_autor.php");
			$conexion = new Conexion();
			Autor::listadoAutores($conexion);
			break;
		
		default:
			# code...
			break;
	}
?>