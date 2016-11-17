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
    <!-- boostrap-fileinput -->
    <link href="../css/bootstrap-fileinput/fileinput.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../css/custom.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-sm-3 col-md-3 left_col ">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../index.php" class="site_title color-vino letra-logo"><i class="fa fa-book"></i> <span>Bibliotec </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- sidebar menu -->
            <div class="container-fluid responsive">
            <br><br>
              <div style="color: #ECE3E2">
                <h5>Para acceder a más características del sistema</h5>
              </div>
            </div>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a style="font-size: 26px;" href="login.php"> Inicie sesión </a>
                  </li>
                  <li><a style="font-size: 20px;" href="registro_cuenta.php"> Registrar cuenta </a>
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
              <h3>Crear cuenta</h3>
            </div>
          </div>
          <!--registro de cuenta-->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="form-horizontal form-label-left">
                      <span class="section">Información de contacto</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt-nombre"> Nombre<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt-nombre" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt-apellido"> Apellido<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt-apellido" class="form-control col-md-7 col-xs-12" >
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt-contraseña">Contraseña <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="txt-contraseña" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <form id="form-imagen">
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"> Imagen de perfil <span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="imagen" id="imagen" class="form-control col-md-7 col-xs-12" accept="image/*">
                          </div>
                        </div>
                      </form>
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
          <!--/registro de cuenta-->
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

    <!-- Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="modal-sesion">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Cuenta registrada</h4>
          </div>
          <div class="modal-body">
            <h4> La cuenta se registró con éxito</h4>
            <p> Ingresa en el sistema para comenzar a utilizar tu cuenta</p>
            <br>
            <p id="mensaje-registro"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Iniciar sesión</button>
          </div>
        </div>
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
    <!-- bootstrap-fileinput -->
    <script src="../js/bootstrap-fileinput/plugins/canvas-to-blob.min.js"></script>
    <script src="../js/bootstrap-fileinput/plugins/sortable.min.js"></script>
    <script src="../js/bootstrap-fileinput//plugins/purify.min.js"></script>
    <script src="../js/bootstrap-fileinput/fileinput.min.js"></script>
    <script src="../js/bootstrap-fileinput/locales/es.js"></script>

    <script src="../js/registro_cuenta.js"></script>

    <!-- JS -->
    <script>
      $(document).ready(function() {

      });
    </script>
    <!-- /JS -->
  </body>
</html>
