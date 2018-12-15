<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    
  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="views/css/estilos.css">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="views/dist/css/AdminLTE.css">

    <!-- AdminLTE Skins -->
    <link rel="stylesheet" href="views/dist/css/skins/_all-skins.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <!--===============================================

                Plugins de JavaScript

    ===================================================-->
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="views/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- SlimScroll -->
    <script src="views/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

    <!-- FastClick -->
    <script src="views/bower_components/fastclick/lib/fastclick.js"></script>

    <!-- AdminLTE App -->
    <script src="views/dist/js/adminlte.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="views/dist/js/demo.js"></script>

    <script>
    $(document).ready(function () {
        
    })
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <?php
        echo '<div class="wrapper">';
            include "modules/menu.php";

            if(isset($_GET["ruta"])){
                if($_GET["ruta"] == "inicio" ||
                  $_GET["ruta"] == "crud" ||
                  $_GET["ruta"] == "prediccion"||
                  $_GET["ruta"] == "cargarDatosProyecto"||
                  $_GET["ruta"] == "crearTablas"||
                  $_GET["ruta"] == "eliminarTablas"||
                  $_GET["ruta"] == "mostrarDatosProyecto"
                 ){
                  include "modules/".$_GET["ruta"].".php";
                  
                }else{
                  //include "modules/404.php";
                }
              }else{
                include "modules/inicio.php";
              }
        echo '</div>';
    ?>
</body>
</html>