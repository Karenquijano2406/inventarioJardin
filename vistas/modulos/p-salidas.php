
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel Productos Salidas
        <small>Tabla Productos Salidas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tabla Productos Salidas</a></li>
        <li class="active">Salidas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- //boton agregar usuarios -->
            <div class="box-header display">

             
              
              <!-- Botones para generar reportes -->

          <a href="vistas/modulos/productos-salidas-excel.php?productosSExcel=productosSExcel" class="btn btn-success">Productos Salidas Excel</a>

          <a href="vistas/modulos/productos-salidas-word.php?productosSWord=productosSWord" class="btn btn-primary">Productos Salidas Word</a>

          <a href="vistas/modulos/productos-salidas-csv.php?productosSCSV=productosSCSV" class="btn btn-warning">Productos Salidas CSV</a>

          <a href="extensiones/tcpdf/pdf/productos-salidas-pdf.php" class="btn btn-danger">Productos Salidas PDF</a>

          <a href="extensiones/tcpdf/pdf/productos-salidas-horizontal-pdf.php" class="btn btn-danger">Productos Salidas PDF Horizontal</a>

          </div>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Productos Salidas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped tablas">
                <thead>
                <tr>
                <th>id</th>

                  
                  <th>Categoría</th>
                  <th>Nombre del Producto</th>
                  <th>Nombre del Cliente</th>
                  <th>Salida</th>
                  <th>Fecha</th>

                  
                </tr>
                </thead>
                <tbody>

                <?php 

                $productos = ControladorProductos::ctrMostrarProductosSalidas(null,null);

                 foreach ($productos as $key => $datos) {

                  // para darle color a los botones segun la cantidad de existencia
                  /* if ($datos["stock"] <= 3 ){
                    $stock = "<div class='btn btn-danger'>".$datos["stock"]."</div>";

                }elseif ($datos["stock"] >= 4 && $datos["stock"] <= 10) { 
                    $stock = "<div class='btn btn-warning'>".$datos["stock"]."</div>";
                }else {
                    $stock = "<div class='btn btn-success'>".$datos["stock"]."</div>";
                } */


                  
                  echo '

                  <tr>

                    <td>'.($key+1).'</td>
                    
                    <td>'.$datos["categoriap"].'</td>
                    <td>'.$datos["nombrep"].'</td>
                    <td> '.$datos["nombreCliente"].'</td>
                    <td> '.$datos["salidap"].'</td>
                    <td> '.$datos["fecha"].'</td>
                  
                  </tr>';


                }
                
                
                ?>
                </tbody>

                
                
          




              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




  



