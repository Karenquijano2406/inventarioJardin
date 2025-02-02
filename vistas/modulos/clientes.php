
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel Clientes
        <small>Tabla Clientes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tabla Clientes</a></li>
        <li class="active">Clientes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- //boton agregar usuarios -->
            <div class="box-header display">

              <button class="btn btn-primary" data-toggle="modal" data-target="#modalClientes">Agregar Cliente</button>
              
              <!-- Botones para generar reportes -->

          <a href="vistas/modulos/clientes-excel.php?clientesExcel=clientes" class="btn btn-success">Clientes Excel</a>

          <a href="vistas/modulos/clientes-word.php?clientesWord=clientes" class="btn btn-primary">Clientes Word</a>

          <a href="vistas/modulos/clientes-csv.php?clientesCSV=clientes" class="btn btn-warning">Clientes CSV</a>

          <a href="extensiones/tcpdf/pdf/clientes-pdf.php" class="btn btn-danger">Clientes PDF</a>

          <a href="extensiones/tcpdf/pdf/clientes-horizontal-pdf.php" class="btn btn-danger">Clientes PDF Horizontal</a>

          </div>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Clientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped tablas">
                <thead>
                <tr>
                <th>id</th>

                  <th>Nombre</th>
                  <th>Correo Electrónico</th>
                  <th>Teléfono</th>
                  <th>Direccción</th>
                  <th>Fecha</th>
                  <th>Acciones</th>
                  
                </tr>
                </thead>
                <tbody>

                <?php 

                $clientes = ControladorClientes::ctrMostrarClientes(null,null);

                foreach ($clientes as $key => $datos) {
                  
                  echo '

                  <tr>

                    <td>'.($key+1).'</td>
                    <td>'.$datos["nombre"].'</td>
                    <td>'.$datos["correo"].'</td>
                    <td>'.$datos["telefono"].'</td>
                    <td>'.$datos["direccion"].'</td>
                    <td>'.$datos["fecha"].'</td>

                    <td>

                    <button class="btn btn-primary btnEditarClientes" data-toggle="modal" data-target="#modalEditarClientes" idCliente="'.$datos["id"].'">Editar</button>
                    <button class="btn btn-danger btnEliminarClientes" idCliente="'.$datos["id"].'">Eliminar</button>
                    
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




  <!-- ventana modal Ingresar clientes -->
   <div id="modalClientes" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Agregar Cliente</h4>

            </div>
            <div class="modal-body">
              <div class="box-body">

              <!-- Ingresar nombre -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingrese Nombre">

                  </div>

                </div>
<!-- 
                ingresar correo -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope-open"></i></span>
                    <input type="email" class="form-control input-lg" name="nuevoCorreo" placeholder="Ingrese Correo">

                  </div>

                </div>

<!-- 
                ingresar telefono -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingrese Teléfono">

                  </div>

                </div>


                <!-- ingresar direccion -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoDireccion" placeholder="Ingrese Dirección">

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

        $crearCliente = new ControladorClientes();
        $crearCliente->ctrCrearClientes();
        
        ?>


      </div>

    </div>

   </div>






   <!-- ventana modal Editar clientes -->
   <div id="modalEditarClientes" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editar Clientes</h4>

            </div>
            <div class="modal-body">
              <div class="box-body">

              <!-- Ingresar nombre -->
                <div class="form-group">
                <label>Nombre:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre">

                  <!-- para que me edite uno por uno los usuarios, ya que antes al editar me editaba los de toda la tabla -->
                    <input type="hidden" name="id" id="id">

                  </div>

                </div>
<!-- 
                ingresar correo -->
                <div class="form-group">
                <label>Correo:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope-open"></i></span>
                    <input type="text" class="form-control input-lg" name="editarCorreo" id="editarCorreo">

                  </div>

                </div>

<!-- 
                ingresar Telefono-->
                <div class="form-group">
                <label>Telefono:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono">

                  </div>

                </div>


                <!-- 
                ingresar direccion-->
                <div class="form-group">
                <label>Dirección:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                    <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion">

                  </div>

                </div>

                

                <!-- boton de Acciones -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>

                </div>






              </div>

            </div>


        </form>


        <?php 

         $editarCliente = new ControladorClientes();
         $editarCliente->ctrEditarClientes();
        
        ?>


      </div>

    </div>

   </div>


   <?php 

        $EliminarCliente = new ControladorClientes();
        $EliminarCliente->ctrBorrarClientes();
        
        ?>





 



