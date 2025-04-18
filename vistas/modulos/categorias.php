
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel Categorias
        <small>Tabla Categorias</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tabla Categorias</a></li>
        <li class="active">Categorias</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- //boton agregar usuarios -->
            <div class="box-header display">

              <button class="btn btn-primary" data-toggle="modal" data-target="#modalCategorias">Agregar Categoria</button>
              
              <!-- Botones para generar reportes -->

          <a href="vistas/modulos/categorias-excel.php?categoriasExcel=categoriasExcel" class="btn btn-success">Categorias Excel</a>

          <a href="vistas/modulos/categorias-word.php?categoriasWord=categoriasWord" class="btn btn-primary">Categorias Word</a>

          <a href="vistas/modulos/categorias-csv.php?categoriasCSV=categoriasCSV" class="btn btn-warning">Categorias CSV</a>

          <a href="extensiones/tcpdf/pdf/categorias-pdf.php" class="btn btn-danger">Categorias PDF</a>

          <a href="extensiones/tcpdf/pdf/categorias-horizontal-pdf.php" class="btn btn-danger">Categorias PDF Horizontal</a>

          </div>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Categorias</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped tablas">
                <thead>
                <tr>
                <th>id</th>

                  <th>Nombre</th>
                  <th>Fecha de entrada </th>
                  <th>Acciones</th>
                  
                </tr>
                </thead>
                <tbody>

                <?php 

                $categorias = ControladorCategorias::ctrMostrarCategorias(null,null);

                foreach ($categorias as $key => $datos) {
                  
                  echo '

                  <tr>

                    <td>'.($key+1).'</td>
                    <td>'.$datos["nombre"].'</td>
                    <td>'.$datos["fecha"].'</td>

                    <td>

                    <button class="btn btn-primary btnEditarCategoria" data-toggle="modal" data-target="#modalEditarCategoria" idCategoria="'.$datos["id"].'">Editar</button>
                    <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$datos["id"].'">Eliminar</button>
                    
                    </td>
                  
                  
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




  <!-- ventana modal Ingresar usuarios -->
   <div id="modalCategorias" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Agregar Categorias</h4>

            </div>
            <div class="modal-body">
              <div class="box-body">

              <!-- Ingresar categoria -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control input-lg" name="nombreCategoria" placeholder="Ingrese Categoria">

                  </div>

                </div>



                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>

                </div>






              </div>

            </div>


        </form>


        <?php 

         $crearCategoria = new ControladorCategorias();
        $crearCategoria->ctrCrearCategorias();
        
        ?>


      </div>

    </div>

   </div>






   <!-- ventana modal Editar categoria -->
   <div id="modalEditarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editar Categoria</h4>

            </div>
            <div class="modal-body">
              <div class="box-body">



              <!-- Ingresar nombre categoria -->
                <div class="form-group">
                <label>Nombre:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control input-lg" name="editarNombreC" id="editarNombreC">

                  <!-- para que me edite uno por uno los usuarios, ya que antes al editar me editaba los de toda la tabla -->
                    <input type="hidden" name="id" id="id">

                  </div>

                </div>




                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>

                </div>






              </div>

            </div>


        </form>


        <?php 

         $editar = new ControladorCategorias();
         $editar->ctrEditarCategorias();
        
        ?>


      </div>

    </div>

   </div>


   <?php 

        $Eliminar = new ControladorCategorias();
        $Eliminar->ctrBorrarCategorias();
        
        ?>





 



