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
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">

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
          <!--préstamo-->
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
                              <input type="radio" id="rd-tipo-libro-fisico" name="rd-tipo-libro" value="fisico" checked> Físico
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" id="rd-tipo-libro-digital" name="rd-tipo-libro" value="digital"> Digital
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Autor <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="slc-autores">
                            <option></option>
                            <option value="Autor 1">Autor1</option>
                            <option value="Autor 2">Autor2</option>
                            <option value="Autor 3">Autor3</option>
                            <option value="Autor 4">Autor4</option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Editorial <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="slc-editoriales">
                            <option></option>
                            <option value="Editorial 1">Editorial1</option>
                            <option value="Editorial 2">Editorial2</option>
                            <option value="Editorial 3">Editorial3</option>
                            <option value="Editorial 4">Editorial4</option>
                          </select>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Categoría <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="slc-categorias">
                            <option></option>
                            <option value="Categoría 1"> Categoría 1 </option>
                            <option value="Categoría 2"> Categoría 2 </option>
                            <option value="Categoría 3"> Categoría 3 </option>
                            <option value="Categoría 4"> Categoría 4 </option>
                            <option value="Categoría 5"> Categoría 5 </option>
                            <option value="Categoría 6"> Categoría 6 </option>
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
                          <input type="text" id="txt-coleccion" class="form-control col-md-7 col-xs-12">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Sucursal(es) <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_multiple form-control multiple_sucursal" multiple="multiple" id="slc-sucursal">
                            <option> Sucursal 1 </option>
                            <option> Sucursal 2 </option>
                            <option> Sucursal 3 </option>
                            <option> Sucursal 4 </option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file-imagen-perfil"> Imagen de portada <span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="file-imagen-perfil" class="form-control col-md-7 col-xs-12" accept="image/*">
                        </div>
                      </div>
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
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../js/custom.min.js"></script>

    <script src="../js/registro_libro.js"></script>

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