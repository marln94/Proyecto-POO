<?php
	switch ($_GET["opcion"]) {
		case 'usuario':
			echo "../images/persona1.jpg".",";
			echo "Marlon Calderón".",";
			break;

		case 'bibliotecario':
			echo "../images/user2.png".",";
			echo "Marlon Calderón".",";
			break;

		case 'administrador':
			echo "../images/user.png".",";
			echo "Administrador".",";
			break;
		
		case 'categorias':
			sleep(1); 
		  	for($i=1;$i<=30;$i++){
			  echo '<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12" style="height: 110px;">
			    <div class="img-portadas">
			      <img id="slider" src="images/book1.jpg" width="70" height="100">
			    </div>
			    <div class="tile-stats" style="top: 15px;">
			      <div class="count">1</div>
			      <h3><a href="formularios/categoria_x.php" class="btn btn2" id="categoria'.$i.'">Categoría'.$i.'</a><h3>
			    </div>
			  </div>';
			}
			break;

		case 'categorias-usuarios':
			sleep(1); 
		  	for($i=1;$i<=30;$i++){
			  echo '<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12" style="height: 110px;">
			    <div class="img-portadas">
			      <img id="slider" src="images/book1.jpg" width="70" height="100">
			    </div>
			    <div class="tile-stats" style="top: 15px;">
			      <div class="count">1</div>
			      <h3><a href="categoria_x.php" class="btn btn2" id="categoria'.$i.'">Categoría'.$i.'</a><h3>
			    </div>
			  </div>';
			}
			break;

		case 'tabla-libros':
			

			break;
		

		case 'tabla-libros':
			

			break;


		case 'tabla-editoriales':
			

			break;


		case 'tabla-categorias':


			break;

		case 'libros':
			for ($i=0; $i < 5; $i++) { 
			echo '<div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 130px;">
                    <div class="img-portadas-libro">
                      <img id="img-portada-libro" src="../images/book1.jpg" width="80" height="110">
                    </div>
                    <div class="tile-stats" style="top: 15px;">
                      <div><a class="count2" id="a-titulo-libro" href="libro.php"> Título del  libro </a></div>
                      <ul class="stats-overview info-libro">
                        <li>
                          <span class="value" id="span-autor-libro"> Nombre Apellido de autor</span>
                        </li>
                        <li>
                          <span class="value" id="span-editorial-libro">Editorial</span>
                        </li>
                        <li>
                          <span class="value" id="span-año-publicacion-libro">Año de publicación</span>
                        </li>
                      </ul>
                      <div></div>
                    </div>
                  </div>';
            }
			break;

		case 'listado-bibliotecarios':
			for($i=0;$i<5;$i++){
			echo '<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Bibliotecario</i></h4>
                            <div class="left col-xs-7">
                              <h2 id="nombre-bibliotecario">Nicole Pearson</h2>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-envelope"></i> Correo: </li>
                                <li><i class="fa fa-phone"></i> Teléfono: </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="../images/user.png" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                        </div>
                      </div>';
            };
			break;

		case 'listado-usuarios':
			for($i=0;$i<20;$i++){
			echo '<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Usuario</i></h4>
                            <div class="left col-xs-7">
                              <h2 id="nombre-usuario">Nicole Pearson</h2>
                              <ul class="list-unstyled">
                                <li id="li-correo-usuario"><i class="fa fa-envelope"></i> Correo: </li>
                                <li id="li-nombre-usuario"><i class="fa fa-user"></i> Nombre de usuario: </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="../images/user2.png" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                        </div>
                      </div>';
            };
			break;
			
		default:
			# code...
			break;
	}

?>