<?php 
  
  session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>YOGA LOFT | ADMIN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/logo-menu-negro.png">

  <!--===================================
  =            PLUGINS CSS            =
  ===================================-->
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!--=============================================
  =            PLUGINS DE JAVASCRIPT            =
  =============================================-->  

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

</head>

<!--==============================
=            CUERPO            =
==============================-->

<body class="hold-transition skin-blue sidebar-mini login-page">

  <!-- =============================================== -->

  <?php 

    if(isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == 'ok'){

      echo '<div class="wrapper"></div>';

      include 'modulos/header.php'; //HEADER DEL SITIO
      include 'modulos/menulateral.php'; //MENU LATERAL
      if(isset($_GET["ruta"])){
        if($_GET["ruta"] == "slides" ||
           $_GET["ruta"] == "productos" ||
           $_GET["ruta"] == "salir"){

          include 'modulos/'.$_GET["ruta"].'.php'; //LISTA BLANCA DE PÁGINAS CON CONTENIDO

        }else{
          include "modulos/404.php";
        }
      }else{
        include 'modulos/slides.php';
      }
      include 'modulos/footer.php'; //PIE DE PÁGINA DEL SITIO

      echo '</div>';

    }else{
      include 'modulos/login.php';
    }

   ?>

  <!-- =============================================== -->

<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/slides.js"></script>
</body>
</html>
