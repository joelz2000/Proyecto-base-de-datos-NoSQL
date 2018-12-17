

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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>Cantidad Ventas</th>
                      <th>Categoria</th>
                      <th>Marca</th>
                      <th>Descripcion</th>
                      <th>Distribuidor</th>
                      <th>Medida</th>
                      <th>Modelo</th>
                      <th>Colores</th>
                      <th>Target</th>

                  </tr>
                  <!--<tr>
                    <th>ID</th>
                    <th>Descripcion</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Color</th>
                    <th>Pantalla</th>
                    <th>Consolas</th>
                    <th>Videjuegos</th>
                    <th>Muebles</th>
                    <th>Pantalones</th>
                    <th>Camisas</th>
                    <th>Celulares</th>
                    <th>Telefonia</th>
                    <th>Laptops</th>
                    <th>Desktops</th>
                    <th>target</th>

                  </tr>-->
                </thead>
                
                <tbody>
                  <?php
                    $prediccion = new ControllerPrediccion();
                    $prediccion -> ctrMostrarDatosPrediccion();
                  ?>
                </tbody>
            </table>

            
            </div>  
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

   