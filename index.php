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
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">

    <link href="css/unslider.css" rel="stylesheet">
    <link href="css/unslider-dots.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-sm-3 col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title color-vino" style="border: 0;">
              <a href="index.php" class="site_title color-vino letra-logo"">&nbsp&nbspBibli<i class="fa fa-book" style="font-size: 29px;"></i><span>tec</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="container-fluid responsive">
            <br><br>
              <div style="color: #ECE3E2">
                <h5>Para acceder a más características del sistema</h5>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a style="font-size: 26px;"> Inicie sesión </a>
                    <ul class="nav child_menu">
                      <li><a><i class="fa fa-user"></i> Registrado </a></li>
                      <li><a><i class="fa fa-user"></i> Bibliotecario </a></li>
                      <li><a><i class="fa fa-user"></i> Administrador </a></li>
                      <br>
                      <li><a><i class="fa fa-user-plus"></i> Registrarse </a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle visible-xs visible-sm">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

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
          <!--categorías-->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Categorías</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row top_tiles">
                      <?php  
                        for($i=1;$i<=30;$i++){
                      ?>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12" style="height: 110px;">
                        <div class="img-portadas">
                          <img id="slider" src="images/book1.jpg" width="70" height="100">
                            <!--<ul>
                              <li><img src="images/book1.jpg" width="70" height="100" ></li>
                              <li><img src="images/book2.png" width="70" height="100" ></li>
                              <li><img src="images/book3.jpg" width="70" height="100" ></li>
                            </ul>-->
                          
                        </div>
                        <div class="tile-stats" style="top: 15px;">
                          <div class="count">1</div>
                          <h3>Categoría <?php echo $i?> </h3>
                        </div>
                      </div>
                      <?php  
                        }
                      ?>
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
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="js/custom.min.js"></script>
    <!-- UNSlider -->
    <script src="js/unslider.js"></script>

    <!-- JS -->
    <script>
      $(document).ready(function() {
        /*Slider para imágenes en las categorías*/
        var imgArray = [
          "images/book1.jpg",
          "images/book2.png",
          "images/book3.jpg"];
        indice = 0;
        duracion = 4000;
        animarImagenes = function(){
          $('#slider').toggleClass("fadeOut");
          setTimeout(function(){
            $('#slider').attr('src',imgArray[indice]);
            $('#slider').toggleClass("fadeOut");
          },1500);
          indice++;
          if(indice == imgArray.length){ indice = 0; }
          setTimeout(animarImagenes, duracion);
        }
        animarImagenes();
      });
    </script>
    <!-- /JS -->
  </body>
</html>
