<?php
	switch ($_GET['opcion']) {
		case 'categorias':
			include_once("../class/class_conexion.php");
			include_once("../class/class_categoria.php");

			$conexion = new Conexion();
			Categoria::cargarCategorias($conexion, "", "formularios/");
			break;
		
		default:
			# code...
			break;
	}
?>