<?php
	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_prestamo.php");
			$conexion = new Conexion();
			Prestamo::prestamosPorUsuario($conexion,$_POST["codigo-usuario"]);
			break;
		
		case '2':
			include_once("../class/class_conexion.php");
			include_once("../class/class_libro.php");
			$conexion = new Conexion();
			Libro::devolverLibro($conexion,$_POST["codigo-libro"],$_POST["codigo-usuario"],$_POST["fecha-devolucion"]);
			break;

		case '3':
			include_once("../class/class_conexion.php");
			include_once("../class/class_prestamo.php");
			$conexion = new Conexion();
			Prestamo::prestamosGeneral($conexion);
			break;
		default:
			# code...
			break;
	}
?>