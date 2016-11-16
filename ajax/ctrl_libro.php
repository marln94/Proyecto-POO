<?php
	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_libro.php");
			$conexion = new Conexion();
			Libro::informacionLibro($conexion,$_POST["codigo-libro"],$_POST["codigo-tipo-usuario"]);
			break;

		case '2':
			include_once("../class/class_conexion.php");
			include_once("../class/class_libro.php");
			$conexion = new Conexion();
			Libro::solicitarLibro($conexion,$_POST["codigo-libro"],$_POST["codigo-usuario"],$_POST["fecha-prestamo"]);
			break;

		case '3':
			include_once("../class/class_conexion.php");
			include_once("../class/class_libro.php");
			$conexion = new Conexion();
			Libro::solicitarLibroBibliotecario($conexion,$_POST["codigo-libro"],$_POST["codigo-usuario"],$_POST["fecha-prestamo"]);
			break;
		
		default:
			# code...
			break;
	}
?>