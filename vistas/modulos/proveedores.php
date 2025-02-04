
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel Proveedores
        <small>Tabla Proveedores</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tabla Proveedores</a></li>
        <li class="active">Proveedores</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- //boton agregar usuarios -->
            <div class="box-header display">

              <button class="btn btn-primary" data-toggle="modal" data-target="#modalProveedores">Agregar Proveedor</button>
              
              <!-- Botones para generar reportes -->

          <a href="vistas/modulos/proveedores-excel.php?proveedoresExcel=proveedores" class="btn btn-success">Proveedores Excel</a>

          <a href="vistas/modulos/proveedores-word.php?proveedoresWord=proveedores" class="btn btn-primary">Proveedores Word</a>

          <a href="vistas/modulos/proveedores-csv.php?proveedoresCSV=proveedores" class="btn btn-warning">Proveedores CSV</a>

          <a href="extensiones/tcpdf/pdf/proveedores-pdf.php" class="btn btn-danger">Proveedores PDF</a>

          <a href="extensiones/tcpdf/pdf/proveedores-horizontal-pdf.php" class="btn btn-danger">Proveedores PDF Horizontal</a>

          </div>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Proveedores</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped tablas">
                <thead>
                <tr>
                <th>id</th>

                  <th>Empresa</th>
                  <th>Tipo de Empresa</th>
                  <th>Correo Electrónico</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Acciones</th>
                  
                </tr>
                </thead>
                <tbody>

                <?php 

                $proveedores = ControladorProveedores::ctrMostrarProveedores(null,null);

                foreach ($proveedores as $key => $datos) {
                  
                  echo '

                  <tr>

                    <td>'.($key+1).'</td>
                    <td>'.$datos["empresa"].'</td>
                    <td>'.$datos["tipoEmpresa"].'</td>
                    <td>'.$datos["correo"].'</td>
                    <td>'.$datos["telefono"].'</td>
                    <td>'.$datos["direccion"].'</td>

                    <td>

                    <button class="btn btn-primary btnEditarProveedores" data-toggle="modal" data-target="#modalEditarProveedores" idProveedores="'.$datos["id"].'">Editar</button>
                    <button class="btn btn-danger btnEliminarProveedores" idProveedores="'.$datos["id"].'">Eliminar</button>
                    
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




  <!-- ventana modal Ingresar proveedores -->
   <div id="modalProveedores" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Agregar Proveedor</h4>

            </div>
            <div class="modal-body">
              <div class="box-body">

              <!-- Ingresar nombre -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoEmpresa" placeholder="Ingrese Empresa">

                  </div>

                </div>


                <!-- ingresar tipo de empresa -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                    <select class="form-control input-lg" name="TipoEmpresa">
                      <option id="editarPerfil">Tipo de Empresa</option>
                      <option value="Distribuidor Abarrotes y productos básicos">Distribuidor Abarrotes y Productos Básicos</option>
                        <option value="Distribuidor de Frutas y verduras">Distribuidor de Frutas y Verduras </option>
                        <option value="Distribuidor de Lácteos y panadería">Distribuidor de Lácteos y Panadería </option>
                        <option value="Distribuidor de Carnes y mariscos">Distribuidor de Carnes y Mariscos </option>
                        <option value="Distribuidor de Desechables y empaques">Distribuidor de Desechables y Empaques </option>

                    </select>

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

        $crearProveedores = new ControladorProveedores();
        $crearProveedores->ctrCrearProveedores();
        
        ?>


      </div>

    </div>

   </div>






   <!-- ventana modal Editar proveedor -->
   <div id="modalEditarProveedores" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editar Proveedor</h4>

            </div>
            <div class="modal-body">
              <div class="box-body">

              <!-- Ingresar nombre empresa -->
                <div class="form-group">
                <label>Nombre:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control input-lg" name="editarEmpresa" id="editarEmpresa">

                  <!-- para que me edite uno por uno los usuarios, ya que antes al editar me editaba los de toda la tabla -->
                    <input type="hidden" name="id" id="id">

                  </div>

                </div>


                <!-- ingresar tipo de empresa -->
                <div class="form-group">
                <label>Tipo de Empresa:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                    <select class="form-control input-lg" name="editarTipoEmpresa">
                      <option id="editarTipoEmpresa"></option>
                      <option value="Distribuidor Abarrotes y productos básicos">Distribuidor Abarrotes y Productos Básicos</option>
                        <option value="Distribuidor de Frutas y verduras">Distribuidor de Frutas y Verduras </option>
                        <option value="Distribuidor de Lácteos y panadería">Distribuidor de Lácteos y Panadería </option>
                        <option value="Distribuidor de Carnes y mariscos">Distribuidor de Carnes y Mariscos </option>
                        <option value="Distribuidor de Desechables y empaques">Distribuidor de Desechables y Empaques </option>

                    </select>

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

         $editarProveedores = new ControladorProveedores();
         $editarProveedores->ctrEditarProveedores();
        
        ?>


      </div>

    </div>

   </div>


   <?php 

        $EliminarProveedores = new ControladorProveedores();
        $EliminarProveedores->ctrBorrarProveedores();
        
        ?>





 



