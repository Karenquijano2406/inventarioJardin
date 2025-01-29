
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel Usuarios
        <small>Tabla Usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tabla Usuarios</a></li>
        <li class="active">Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- //boton agregar usuarios -->
            <div class="box-header display">

              <button class="btn btn-primary" data-toggle="modal" data-target="#modalUsuarios">Agregar Usuario</button>
              
              <!-- Botones para generar reportes -->

          <a href="vistas/modulos/usuarios-excel.php?usuariosExcel=usuarios" class="btn btn-success">Usuarios Excel</a>

          <a href="vistas/modulos/usuarios-word.php?usuariosWord=usuarios" class="btn btn-primary">Usuarios Word</a>

          <a href="vistas/modulos/usuarios-csv.php?usuariosCSV=usuarios" class="btn btn-warning">Usuarios CSV</a>

          <a href="extensiones/tcpdf/pdf/usuarios-pdf.php" class="btn btn-danger">Usuarios PDF</a>

          <a href="extensiones/tcpdf/pdf/usuarios-horizontal-pdf.php" class="btn btn-danger">Usuarios PDF Horizontal</a>

          </div>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Usuarios</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped tablas">
                <thead>
                <tr>
                <th>id</th>

                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Perfil</th>
                  <th>Fecha de entrada </th>
                  <th>Acciones</th>
                  
                </tr>
                </thead>
                <tbody>

                <?php 

                $usuarios = ControladorUsuarios::ctrMostrarUsuarios(null,null);

                foreach ($usuarios as $key => $datos) {
                  
                  echo '

                  <tr>

                    <td>'.($key+1).'</td>
                    <td>'.$datos["nombre"].'</td>
                    <td>'.$datos["usuario"].'</td>
                    <td>'.$datos["perfil"].'</td>
                    <td>'.$datos["fecha"].'</td>

                    <td>

                    <button class="btn btn-primary btnEditarUsuarios" data-toggle="modal" data-target="#modalEditarUsuarios" idUsuario="'.$datos["id"].'">Editar</button>
                    <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$datos["id"].'">Eliminar</button>
                    
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
   <div id="modalUsuarios" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Agregar Usuario</h4>

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
                ingresar usuario -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingrese Usuario">

                  </div>

                </div>

<!-- 
                ingresar password -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingrese Contraseña">

                  </div>

                </div>

                <!-- ingresar perfil -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                    <select class="form-control input-lg" name="nuevoPerfil">
                      <option>Seleccionar Perfil</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Especial">Especial</option>

                    </select>

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

        $crearUsuario = new ControladorUsuarios();
        $crearUsuario->ctrCrearUsuarios();
        
        ?>


      </div>

    </div>

   </div>






   <!-- ventana modal Editar usuarios -->
   <div id="modalEditarUsuarios" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editar Usuario</h4>

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
                ingresar usuario -->
                <div class="form-group">
                <label>Usuario</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <input type="text" class="form-control input-lg" name="editarUsuario" id="editarUsuario">

                  </div>

                </div>

<!-- 
                ingresar password -->
                <div class="form-group">
                <label>Contraseña:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control input-lg" name="editarPassword">

                  </div>

                </div>

                <!-- ingresar perfil -->
                <div class="form-group">
                <label>Perfil:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                    <select class="form-control input-lg" name="editarPerfil" id="editarPerfil">
                    <option value="Administrador">Administrador</option>
                    <option value="Especial">Especial</option>
                    </select>
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

         $editarUsuario = new ControladorUsuarios();
         $editarUsuario->ctrEditarUsuarios();
        
        ?>


      </div>

    </div>

   </div>


   <?php 

        $EliminarUsuario = new ControladorUsuarios();
        $EliminarUsuario->ctrBorrarUsuarios();
        
        ?>





 



