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

    <!-- Custom Theme Style -->
    <link href="../css/custom.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-sm-3 col-md-3 left_col">
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
                  <li><a href="prestamos.php"><i class="fa fa-tasks"></i> Préstamos en curso </span></a>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-circle"></i> Administrar libros </a>
                    <ul class="nav child_menu">
                      <li><a href="listado_libro.php"><i class="fa fa-table"></i> Listado </span></a>
                      </li>
                      <li><a href="registro_libro.php"><i class="fa fa-plus-circle"></i> Registrar libro </span></a>
                      </li>
                      <li><a href="retiro_libro.php"><i class="fa fa-minus-circle"></i> Retirar libro </span></a>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-circle"></i> Administrar autores </a>
                    <ul class="nav child_menu">
                      <li><a href="listado_autor.php"><i class="fa fa-table"></i> Listado </span></a>
                      </li>
                      <li><a href="registro_autor.php"><i class="fa fa-plus-circle"></i> Registrar autor </span></a>
                      </li>
                      <li><a href="retiro_autor.php"><i class="fa fa-minus-circle"></i> Retirar autor </span></a>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-circle"></i> Administrar editoriales </a>
                    <ul class="nav child_menu">
                      <li><a href="listado_editorial.php"><i class="fa fa-table"></i> Listado </span></a>
                      </li>
                      <li><a href="registro_editorial.php"><i class="fa fa-plus-circle"></i> Registrar editorial </span></a>
                      </li>
                      <li><a href="retiro_editorial.php"><i class="fa fa-minus-circle"></i> Retirar editorial </span></a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-circle"></i> Administrar categorías </a>
                    <ul class="nav child_menu">
                      <li><a href="listado_categoria.php"><i class="fa fa-table"></i> Listado </span></a>
                      </li>
                      <li><a href="registro_categoria.php"><i class="fa fa-plus-circle"></i> Registrar categoria </span></a>
                      </li>
                      <li><a href="retiro_categoria.php"><i class="fa fa-minus-circle"></i> Retirar categoria </span></a>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-circle"></i> Administrar colecciones </a>
                    <ul class="nav child_menu">
                      <li><a href="listado_coleccion.php"><i class="fa fa-table"></i> Listado </span></a>
                      </li>
                      <li><a href="registro_coleccion.php"><i class="fa fa-plus-circle"></i> Registrar colección </span></a>
                      </li>
                      <li><a href="retiro_coleccion.php"><i class="fa fa-minus-circle"></i> Retirar colección </span></a>
                      </li>
                    </ul>
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
                    <h3>Categorías</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row top_tiles" id="contenedor-categorias">
                      
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
    <!-- Custom Theme Scripts -->
    <script src="../js/custom.min.js"></script>

    <!-- JS -->
    <script>
      $(document).ready(function() {
        $('#contenedor-categorias').html('<p style="text-align: center;"><img src="../images/loading.gif"> </p>');
        $.ajax({
          type: 'POST',
          url: '../php/carga.php?opcion=bibliotecario',
          success: function(respuesta){
            var arr = respuesta.split(',');
            document.title = 'Bibliotec - '+arr[1];
            $('#imagen-usuario').attr('src',arr[0])
            $('#nombre-usuario').html(arr[1]);

          }
        });
        $.ajax({
          type: 'POST',
          url: '../php/carga.php?opcion=categorias-usuarios',
          success: function(respuesta){
            $('#contenedor-categorias').html(respuesta);
            $("#categoria1").click(function(event){
              
            });
          }
        });
      });
    </script>
    <!-- /JS -->
  </body>
</html>