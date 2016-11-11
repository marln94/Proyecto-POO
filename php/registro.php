<?php  

	switch ($_GET['opcion']) {

		case 'cuenta-bibliotecario':
			if($_POST["txt-nombre"] == ""){
				echo "error";
				break;}
			if($_POST["txt-email"] == ""){
				echo "error";
				break;}
			if($_POST["txt-nombre-usuario"] == ""){
				echo "error";
				break;}
			if($_POST["txt-contraseña"] == ""){
				echo "error";
				break;}
			if($_POST["txt-domicilio"] == ""){
				echo "error";
				break;}
			if($_POST["txt-telefono"] == ""){
				echo "error";
				break;}
			break;
		
		case 'libro':
			if ($_POST["rd-tipo-libro"] == "fisico") {
				if($_POST["txt-titulo"] == ""){
					echo "error";
					break;}
				if($_POST["slc-autores"] == ""){
					echo "error";
					break;}
				if($_POST["slc-editoriales"] == ""){
					echo "error";
					break;}
				if($_POST["txt-año"] == ""){
					echo "error";
					break;}
				if($_POST["slc-categorias"] == null){
					echo "error";
					break;}
				if($_POST["txt-ejemplares"] == ""){
					echo "error";
					break;}
				if($_POST["txt-descripcion-fisica"] == ""){
					echo "error";
					break;}
				if($_POST["txt-coleccion"] == ""){
					echo "error";
					break;}
				if($_POST["txt-isbn"] == ""){
					echo "error";
					break;}
				if($_POST["slc-sucursal"] == ""){
					echo "error";
					break;}
			}

			if ($_POST["rd-tipo-libro"] == "digital") {
				if($_POST["txt-titulo"] == ""){
					echo "error";
					break;}
				if($_POST["slc-autores"] == ""){
					echo "error";
					break;}
				if($_POST["slc-editoriales"] == ""){
					echo "error";
					break;}
				if($_POST["txt-año"] == ""){
					echo "error";
					break;}
				if($_POST["slc-categorias"] == null){
					echo "error";
					break;}
				if($_POST["txt-coleccion"] == ""){
					echo "error";
					break;}
				if($_POST["txt-isbn"] == ""){
					echo "error";
					break;}
			}
			break;

		case 'autor':
			if($_POST["txt-nombre-autor"] == ""){
				echo "error";
				break;}
			if($_POST["txt-nacimiento"] == ""){
				echo "error";
				break;}
			if($_POST["txt-fallecimiento"] == ""){
				echo "error";
				break;}
			if($_POST["txt-nacionalidad"] == ""){
				echo "error";
				break;}
			if($_POST["txt-lengua-materna"] == ""){
				echo "error";
				break;}
			break;

		case 'editorial':
			if($_POST["txt-nombre-editorial"] == ""){
				echo "error";
				break;}
			if($_POST["txt-nombre-abreviado-editorial"] == ""){
				echo "error";
				break;}
			if($_POST["txt-direccion-editorial"] == ""){
				echo "error";
				break;}
			if($_POST["txt-telefono-editorial"] == ""){
				echo "error";
				break;}
			if($_POST["txt-correo-electronico-editorial"] == ""){
				echo "error";
				break;}
			break;

		case 'categoria':
			if($_POST["txt-nombre-categoria"] == ""){
				echo "error";
				break;
			}
			echo $_POST["txt-nombre-categoria"];
			break;

		case 'coleccion':
			if($_POST["txt-nombre-coleccion"] == ""){
				echo "error";
				break;
			}
			echo $_POST["txt-nombre-coleccion"];
			break;

		default:
			# code...
			break;
	}
?>