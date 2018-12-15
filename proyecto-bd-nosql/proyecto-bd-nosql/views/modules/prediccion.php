
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <h1>
       Muestra de datos a la BD
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <h3>
            <?php
                 $prediccion = new ControllerPrediccion();
                 //$prediccion->mostrarPrediccion();
                 $prediccion->ctrMostrarPrediccion();
                
            ?>
            </h3>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

