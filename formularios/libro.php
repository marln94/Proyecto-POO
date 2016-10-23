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
        <div class="col-sm-3 col-md-3 left_col menu_fixed">
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
                  <li><a style="font-size: 20px;" href="crear_cuenta.php"> Crear cuenta </a>
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
              <h3><i class="fa fa-search" style="font-size: 30px"></i> Búsqueda rápida <span style="font-size: 19px">(visitante)</span> </h3>
            </div>
          </div>
          <div class="input-group" style="margin-bottom: 21px">
            <input type="text" class="form-control form-control-1" placeholder="Buscar libro">
            <span class="input-group-btn">
              <button class="button_1 btn btn-default" type="button">Buscar</button>
            </span>
          </div>
          <!--libros-->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>LibroX</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row top_tiles" id="contenedor-libros">
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <img id="img-portada-libro" src="../images/book3.jpg" class="img-portada-libro-2 img-responsive">
                        <div style="width: 80%;margin: 0 auto;">
                          <div class="btn-group-vertical" style="width: 100%; margin-top: 5%;">
                            <button class="btn btn-default">Solicitar libro</button>
                            <button class="btn btn-default">Leer en digital</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <table class="table table-striped">
                          <tr>
                            <th>Tipo de libro</th>
                            <td> TipoX </td>
                          </tr>
                          <tr>
                            <th>Código</th>
                            <td> xxxxxx</td>
                          </tr>
                          <tr>
                            <th>Título</th>
                            <td> Título x</td>
                          </tr>
                          <tr>
                            <th>Autor</th>
                            <td> Autor x</td>
                          </tr>
                          <tr>
                            <th>Editorial</th>
                            <td> Editorial x</td>
                          </tr>
                          <tr>
                            <th>Año publicación</th>
                            <td> xxxx</td>
                          </tr>
                          <tr>
                            <th>Categoría</th>
                            <td> Categoría x</td>
                          </tr>
                          <tr>
                            <th>Ejemplares</th>
                            <td> xx</td>
                          </tr>
                          <tr>
                            <th>Descripción física</th>
                            <td> págs. xxaosduab</td>
                          </tr>
                          <tr>
                            <th>Colección</th>
                            <td> Colección x</td>
                          </tr>
                          <tr>
                            <th>ISBN</th>
                            <td> xxxx</td>
                          </tr>
                          <tr>
                            <th>Sucursal(es)</th>
                            <td> Sucursal x</td>
                          </tr>
                          <tr>
                            <th>Disponibilidad</th>
                            <td>Disponible</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!--/libros-->
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
        //$('#contenedor-libros').html('<p style="text-align: center;"><img src="../images/loading.gif"> </p>');
        $.ajax({
          type: 'POST',
          url: '../php/carga.php?opcion=libro',
          success: function(respuesta){
            
          }
        });
      });
    </script>
    <!-- /JS -->
  </body>
</html>
