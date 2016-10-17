<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bibliotec</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../css/custom.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-sm-3 col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title color-vino" style="border: 0;">
              <a href="bibliotecario.php" class="site_title color-vino letra-logo"><i class="fa fa-book"></i> <span>Bibliotec </span></a>
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
            <br>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="prestamo_libro.php"><i class="fa fa-arrow-circle-right"></i> Préstamo libro </span></a>
                  </li>
                  <li><a href="recepcion_libro.php"><i class="fa fa-arrow-circle-down"></i> Recepción libro </span></a>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-plus-circle"></i> Ingresar libro </span></a>
                    <ul class="nav child_menu">
                      <li><a href="ingreso_libro.php">Libro físico</a></li>
                      <li><a href="ingreso_libro_digital.php">Libro digital</a></li>
                    </ul>
                  </li>
                  <li><a href="retiro_libro.php"><i class="fa fa-minus-circle"></i> Retirar libro </span></a>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="administracion_editoriales.php"><i class="fa fa-circle"></i> Administrar editoriales </a>
                  </li>
                  <li><a href="administracion_categorias.php"><i class="fa fa-circle"></i> Administrar categorías </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            <!-- footer menu -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Cerrar sesión">
                <span class="glyphicon glyphicon-log-out" aria-hidden="true" style="color: #190705"></span>
              </a>
            </div>
            <!-- /footer menu -->
          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="page-title">
            <div class="title_left">
              <h3><i class="fa fa-search" style="font-size: 30px"></i> Búsqueda rápida </h3>
            </div>
          </div>
          <div class="input-group" style="margin-bottom: 21px">
            <input type="text" class="form-control form-control-1" placeholder="Buscar libro">
            <span class="input-group-btn">
              <button class="button_1 btn btn-default" type="button">Buscar</button>
            </span>
          </div>
          <!--categorías-->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3><span class="fa fa-minus-circle"></span> Retirar libro del sistema </h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row top_tiles">
                    <label>Introduzca el código del libro que se retirará</label>
                      <div class="input-group" style="margin-bottom: 21px">
                        <input type="text" class="form-control form-control" placeholder="código del libro">
                        <span class="input-group-btn">
                          <button class=" btn btn-default" type="button">Buscar</button>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!--/cateogrías-->
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
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../js/custom.min.js"></script>

    <!-- JS -->
    <script>
      $(document).ready(function() {
        $.ajax({
          type: 'POST',
          url: '../php/carga.php?opcion=usuario',
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