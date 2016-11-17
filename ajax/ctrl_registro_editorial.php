<?php 

	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_editorial.php");
			$conexion = new Conexion();
			$editorial = new Editorial(NULL,$_POST["txt-nombre-editorial"],$_POST["txt-nombre-abreviado-editorial"],$_POST["txt-direccion-editorial"],$_POST["txt-telefono-editorial"],$_POST["txt-correo-electronico-editorial"],1);
			$editorial->guardarRegistro($conexion);
			break;
		
		default:
			# code...
			break;
	}
?>