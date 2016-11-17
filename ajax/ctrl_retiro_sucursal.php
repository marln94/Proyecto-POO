<?php
	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_sucursal.php");
			$conexion = new Conexion();
			Sucursal::retirarSucursal($conexion,$_POST["txt-codigo-sucursal"]);
			break;
		
		default:
			# code...
			break;
	}
?>