<?php
	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_coleccion.php");
			$conexion = new Conexion();
			Coleccion::retirarColeccion($conexion,$_POST["txt-codigo-coleccion"]);
			break;
		
		default:
			# code...
			break;
	}
?>