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
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/square/square.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">

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
                  <li><a href="administrar_sucursales.php"><i class="fa fa-circle"></i> Administrar sucursales </a>
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
            <input type="text" class="form-control form-control-1" placeholder="Buscar libro" id="txt-busqueda">
            <span class="input-group-btn">
              <button class="button_1 btn btn-default" id="btn-buscar">Buscar</button>
            </span>
          </div>
          <!--formulario registro libro-->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3><span class="fa fa-plus-circle"></span> Registrar libro en el sistema</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="form-horizontal form-label-left">
                      <span class="section">Información del libro</span>


                      <div class="form-group" id="radios">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Tipo </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="radio">
                            <label>
                              <input type="radio" id="rd-tipo-libro-fisico" name="rd-tipo-libro" value="1" checked> Físico
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" id="rd-tipo-libro-digital" name="rd-tipo-libro" value="2"> Digital
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt-titulo"> Título<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt-titulo" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Autor(es) <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_multiple form-control" multiple="multiple" id="slc-autores">
                            
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Editorial <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="slc-editorial">

                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt-edicion"> Edicion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt-edicion" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt-año"> Año <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt-año" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Categoría(s) <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_multiple form-control" multiple="multiple" id="slc-categorias">
                            
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt-ejemplares"> Ejemplares <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt-ejemplares" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt-descripcion-fisica"> Descripción física <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt-descripcion-fisica" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt-coleccion"> Colección <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="slc-coleccion">

                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt-isbn"> ISBN
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt-isbn" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt-ubicacion"> Ubicación
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt-ubicacion" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Sucursal(es) <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_multiple form-control" multiple="multiple" id="slc-sucursal">
                            
                          </select>
                        </div>
                      </div>
                      <form id="form-imagen" enctype="multipart/form-data">
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file-imagen-perfil"> Imagen de portada <span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="imagen" id="imagen" class="form-control col-md-7 col-xs-12" accept="image/*">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file-libropdf"> Archivo PDF <span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="pdf" id="pdf" class="form-control col-md-7 col-xs-12" accept="application/pdf">
                          </div>
                        </div>
                      </form>
                      <div id="mensaje"></div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="btn-registrar-libro" class="btn btn-success"> Registrar </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!--/formulario registro libro-->
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
            <h4 class="modal-title" id="myModalLabel">Libro registrado</h4>
          </div>
          <div class="modal-body">
            <h4> El libro se ingresó con éxito al sistema</h4>
            <br>
            <p id="mensaje-registro"></p>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../js/custom.min.js"></script>

    <script src="../js/registro_libro.js"></script>

    <!-- JS -->
    <script>
      
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