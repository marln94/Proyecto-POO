<?php
  session_start();
  if(isset($_SESSION['codigo-usuario'])){
    if($_SESSION['codigo-tipo-usuario'] == 2){
?>
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
  <input type="hidden" id="codigo-usuario" value="<?php echo $_SESSION['codigo-usuario']?>">
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
                  <img  alt="..." class="img-thumbnail profile_img" src="../php/imagen.php?id=<?php echo $_SESSION['codigo-usuario'] ?>">
                </div>
                <div class="profile_info">
                  <span>Bienvenido,</span>
                  <h2><?php echo $_SESSION['nombre']." ".$_SESSION['apellido']?></h2>
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
                  <li><a href="administrar_libros.php"><i class="fa fa-circle"></i> Administrar libros </a>
                  </li>
                  <li><a href="administrar_autores.php"><i class="fa fa-circle"></i> Administrar autores </a>
                  </li>
                  <li><a href="administrar_editoriales.php"><i class="fa fa-circle"></i> Administrar editoriales </a>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="administrar_categorias.php"><i class="fa fa-circle"></i> Administrar categorías </a>
                  </li>
                  <li><a href="administrar_colecciones.php"><i class="fa fa-circle"></i> Administrar colecciones </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            <!-- footer menu -->
            <div class="sidebar-footer hidden-small">
              <a href="logout.php" data-toggle="tooltip" data-placement="top" title="Cerrar sesión">
                <span class="glyphicon glyphicon-log-out" aria-hidden="true" style="color: #190705"></span>
              </a>
              <a href="configuracion.php" data-toggle="tooltip" data-placement="top" title="Configuración">
                <span class="glyphicon glyphicon-cog" aria-hidden="true" style="color: #190705"></span>
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
          <!--préstamo-->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3><span class="fa fa-arrow-circle-o-right"></span> Préstamo</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row top_tiles">
                      <div class="col-md-6">
                        <div class="thumbnail" style="height: 400px;">
                          <div class="image view" style="height: 330px;">
                            <div class="uno" id="icono-qr">
                              <div class="dos">
                                <span class="fa fa-qrcode" style="font-size: 180px"></span>
                              </div>
                            </div>
                            <div id="caja-qr" ></div>
                          </div>
                          <div class="caption view">
                            <button class="btn" id="btn-escanear">Escanear código del libro</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="thumbnail" style="height: 400px;">
                          <div class="image view" style="height: 330px;">
                            <div class="uno">
                              <div class="dos">
                                Escriba el código del libro
                                <input type="text" id="txt-codigo-libro" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="caption view">
                            <button class="btn" id="btn-introducir-codigo">Introducir código del libro</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!--/préstamo-->
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
    <div id="modal-aviso" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"> Información </h4>
          </div>
          <div class="modal-body" id="div-editar">
            <p id="mensaje-aviso"></p>
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

    <script src="../js/prestamo_libro.js"></script>
    <script src="../js/jquery.webcamqrcode.js"></script>

    <!-- JS -->
    <script>
      $(document).ready(function() {
        
      });
    </script>
    <!-- /JS -->
  </body>
</html>
<?php
    } else{
      header("Location: page_403.html");
    }
  } else{
    header("Location: ../index.php");
  }
?>