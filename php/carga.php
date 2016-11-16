<?php
	switch ($_GET["opcion"]) {
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