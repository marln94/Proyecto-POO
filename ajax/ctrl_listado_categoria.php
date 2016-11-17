<?php
	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_categoria.php");
			$conexion = new Conexion();
			Categoria::listadoCategorias($conexion);
			break;
		
		default:
			# code...
			break;
	}
?>