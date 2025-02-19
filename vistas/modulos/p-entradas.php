
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel Productos Entradas
        <small>Tabla Productos Entradas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tabla Productos Entradas</a></li>
        <li class="active">Entradas</li>
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

          <a href="vistas/modulos/productos-entradas-excel.php?productosEExcel=productosEExcel" class="btn btn-success">Productos Entrada Excel</a>

          <a href="vistas/modulos/productos-entradas-word.php?productosEWord=productosEWord" class="btn btn-primary">Productos Entrada Word</a>

          <a href="vistas/modulos/productos-entradas-csv.php?productosECSV=productosECSV" class="btn btn-warning">Productos Entrada CSV</a>

          <a href="extensiones/tcpdf/pdf/productos-entradas-pdf.php" class="btn btn-danger">Productos Entrada PDF</a>

          <a href="extensiones/tcpdf/pdf/productos-entradas-horizontal-pdf.php" class="btn btn-danger">Productos Entrada PDF Horizontal</a>

          </div>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Productos Entradas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped tablas">
                <thead>
                <tr>
                <th>id</th>

                  
                  <th>Nombre Empresa</th>
                  <th>Tipo de Empresa</th>
                  <th>Nombre del Producto</th>
                  <th>Entrada</th>
                  <th>Fecha</th>

                  
                </tr>
                </thead>
                <tbody>

                <?php 

                $productos = ControladorProductos::ctrMostrarProductosEntradas(null,null);

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
                    
                    <td>'.$datos["nombreEmpresa"].'</td>
                    <td>'.$datos["tipoEmpresa"].'</td>
                    <td> '.$datos["nombreProducto"].'</td>
                    <td> '.$datos["entradap"].'</td>
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




  



