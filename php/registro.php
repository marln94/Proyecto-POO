<?php  
	/*validar aquí también los campos del formulario*/
	switch ($_GET['opcion']) {
		case 'cuenta':
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
				/*echo $_POST["rd-tipo-libro"].
					$_POST["txt-titulo"].
					$_POST["slc-autores"].
					$_POST["slc-editoriales"].
					$_POST["txt-año"].
					$_POST["slc-categorias"].
					$_POST["txt-ejemplares"].
					$_POST["txt-descripcion-fisica"].
					$_POST["txt-coleccion"].
					$_POST["txt-isbn"].
					$_POST["slc-sucursal"];*/
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
				/*echo $_POST["rd-tipo-libro"].
					$_POST["txt-titulo"].
					$_POST["slc-autores"].
					$_POST["slc-editoriales"].
					$_POST["txt-año"].
					$_POST["slc-categorias"].
					$_POST["txt-coleccion"].
					$_POST["txt-isbn"];*/
			}
			break;

		case 'autor':
			echo $_POST["txt-nombre-autor"].
			$_POST["txt-nacimiento"].
			$_POST["txt-fallecimiento"].
			$_POST["txt-nacionalidad"].
			$_POST["txt-lengua-materna"];
			break;

		default:
			# code...
			break;
	}
?>