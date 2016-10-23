<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bibliotec - Crear cuenta</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../css/custom.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-sm-3 col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="administrador.php" class="site_title color-vino letra-logo"><i class="fa fa-book"></i> <span>Bibliotec </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="container-fluid">
              <div class="">
                <div class="profile_pic">
                  <img  alt="..." class="img-thumbnail profile_img" id="imagen-usuario">
                </div>
                <div class="profile_info">
                  <span>Bienvenido,</span>
                  <h2 id="nombre-usuario"></h2>
                </div>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br><br>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3> Bibliotecarios</h3>
                <ul class="nav side-menu">
                  <li><a href="listado_bibliotecarios.php"><i class="fa fa-table"></i> Ver bibliotecarios</a>
                  </li>
                  <li><a href="crear_cuenta_bibliotecario.php"><i class="fa fa-plus-circle"></i> Crear cuenta</a>
                  </li>
                  <li><a href="eliminar_cuenta_bibliotecario.php"><i class="fa fa-minus-circle"></i> Eliminar cuenta</a>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3> Usuarios</h3>
                <ul class="nav side-menu">
                  <li><a href="listado_usuarios.php"><i class="fa fa-table"></i> Ver usuarios</a>
                  </li>
                  <li><a href="a_crear_cuenta.php"><i class="fa fa-plus-circle"></i> Crear cuenta</a>
                  </li>
                  <li><a href="eliminar_cuenta_usuario.php"><i class="fa fa-minus-circle"></i> Eliminar cuenta</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="page-title">
            <div class="title_left">
              <h3>Crear cuenta de usuario registrado</h3>
            </div>
          </div>
          <!--creación de cuenta-->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="form-horizontal form-label-left">
                      <span class="section">Información de contacto</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt-nombre"> Nombre y apellido<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt-nombre" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt-email"> Correo electrónico <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="txt-email" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt-nombre-usuario"> Nombre de usuario <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt-nombre-usuario" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt-contraseña">Contraseña <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="txt-contraseña" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Imagen de perfil <span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="file-imagen-perfil" class="form-control col-md-7 col-xs-12" accept="image/*">
                        </div>
                      </div>
                      <div id="mensaje"></div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="btn-crear-cuenta" class="btn btn-success">Crear</button>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          <!--/creación de cuenta-->
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../js/custom.min.js"></script>

    <script src="../js/crear_cuenta.js"></script>

    <!-- JS -->
    <script>
      $(document).ready(function() {
        $.ajax({
          type: 'POST',
          url: '../php/carga.php?opcion=administrador',
          success: function(respuesta){
            var arr = respuesta.split(',');
            document.title = 'Bibliotec - '+arr[1];
            $('#imagen-usuario').attr('src',arr[0])
            $('#nombre-usuario').html(arr[1]);

          }
        });
      });
    </script>
    <!-- /JS -->
  </body>
</html>
