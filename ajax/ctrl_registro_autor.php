<?php
	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_autor.php");
			$conexion = new Conexion();
			$autor = new Autor(NULL,$_POST["txt-nacionalidad"],$_POST["txt-lengua-materna"],$_POST["txt-nombre-autor"],$_POST["txt-apellido-autor"],$_POST["txt-nacimiento"],$_POST["txt-fallecimiento"],1);
			$autor->guardarRegistro($conexion);
			
			break;
		default:
			# code...
			break;
	}
?>