<?php
  session_start();
  if(isset($_SESSION["codigo-tipo-usuario"])){
    if($_SESSION["codigo-tipo-usuario"] == 3)
      header("Location: registrado.php");
    if($_SESSION["codigo-tipo-usuario"] == 2)
      header("Location: bibliotecario.php");
    if($_SESSION["codigo-tipo-usuario"] == 1)
      header("Location: administrador.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bibliotec - Inicio de sesión</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../css/custom.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <div class="forma">
              <h1>Iniciar sesión</h1>
              <div>
                <input type="text" class="form-control" placeholder="Correo electrónico" id="txt-email">
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Contraseña" id="txt-contraseña">
              </div>
              <div>
                <a class="btn btn-default submit" id="btn-iniciar" >Iniciar</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-book"></i> Bibliotec</h1>
                  <p>©2016 All Rights Reserved.</p>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div id="modal-advertencia" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"> Advertencia </h4>
          </div>
          <div class="modal-body">
            <p id="mensaje"></p>
          </div>
        </div>
      </div>
    </div>

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/bootstrap/js/modal.js"></script>
    <script src="../js/login.js"></script>

  </body>
</html>
