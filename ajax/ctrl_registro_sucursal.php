<?php 

	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_sucursal.php");
			$conexion = new Conexion();
			$sucursal = new Sucursal(NULL,$_POST["txt-direccion-sucursal"],$_POST["txt-telefono-sucursal"],1);
			$sucursal->guardarRegistro($conexion);
			break;
		
		default:
			# code...
			break;
	}
?>