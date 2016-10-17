<?php
	switch ($_GET["opcion"]) {
		case 'usuario':
			echo "../images/persona1.jpg".",";
			echo "Marlon Calderón".",";
			break;
		
		case 'categorias':
			sleep(1); 
		  	for($i=1;$i<=30;$i++){
			  echo '<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12" style="height: 110px;">
			    <div class="img-portadas">
			      <img id="slider" src="../images/book1.jpg" width="70" height="100">
			    </div>
			    <div class="tile-stats" style="top: 15px;">
			      <div class="count">1</div>
			      <h3><a href="#">Categoría'.$i.'</a><h3>
			    </div>
			  </div>';
			}
			break;
			
		default:
			# code...
			break;
	}

?>