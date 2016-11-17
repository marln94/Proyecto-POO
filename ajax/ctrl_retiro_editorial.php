<?php
	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_editorial.php");
			$conexion = new Conexion();
			Editorial::retirarEditorial($conexion,$_POST["txt-codigo-editorial"]);
			break;
		
		default:
			# code...
			break;
	}
?>