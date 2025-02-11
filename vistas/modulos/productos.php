
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel Productos
        <small>Tabla Productos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tabla Productos</a></li>
        <li class="active">Productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- //boton agregar usuarios -->
            <div class="box-header display">

              <button class="btn btn-primary" data-toggle="modal" data-target="#modalProductos">Agregar Producto</button>
              
              <!-- Botones para generar reportes -->

          <a href="vistas/modulos/productos-excel.php?productosExcel=productos" class="btn btn-success">Productos Excel</a>

          <a href="vistas/modulos/productos-word.php?productosWord=productos" class="btn btn-primary">Productos Word</a>

          <a href="vistas/modulos/productos-csv.php?productosCSV=productos" class="btn btn-warning">Productos CSV</a>

          <a href="extensiones/tcpdf/pdf/productos-pdf.php" class="btn btn-danger">Productos PDF</a>

          <a href="extensiones/tcpdf/pdf/productos-horizontal-pdf.php" class="btn btn-danger">Productos PDF Horizontal</a>

          </div>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Productos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped tablas">
                <thead>
                <tr>
                <th>id</th>

                  <th>Categoría</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Precio Compra</th>
                  <th>Precio Venta</th>
                  <th>Stock</th>
                  <th>Acciones</th>
                  
                </tr>
                </thead>
                <tbody>

                <?php 

                $productos = ControladorProductos::ctrMostrarProductos(null,null);

                foreach ($productos as $key => $datos) {

                  // para darle color a los botones segun la cantidad de existencia
                  if ($datos["stock"] <= 3 ){
                    $stock = "<div class='btn btn-danger'>".$datos["stock"]."</div>";

                }elseif ($datos["stock"] >= 4 && $datos["stock"] <= 10) { 
                    $stock = "<div class='btn btn-warning'>".$datos["stock"]."</div>";
                }else {
                    $stock = "<div class='btn btn-success'>".$datos["stock"]."</div>";
                }


                  
                  echo '

                  <tr>

                    <td>'.($key+1).'</td>
                    <td>'.$datos["categoria"].'</td>
                    <td>'.$datos["nombre"].'</td>
                    <td>'.$datos["descripcion"].'</td>
                    <td>$ '.$datos["precioCompra"].'</td>
                    <td>$ '.$datos["precioVenta"].'</td>
                    <td>'.$stock.'</td>

                    <td>

                    <button class="btn btn-primary btnEditarProductos" data-toggle="modal" data-target="#modalEditarProductos" idProducto="'.$datos["id"].'"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-success btnEntradaProductos" data-toggle="modal" data-target="#modalEntradaProductos" idProducto="'.$datos["id"].'"><i class="fa fa-plus"></i></button>
                    <button class="btn btn-warning btnSalidaProductos" data-toggle="modal" data-target="#modalSalidaProductos" idProducto="'.$datos["id"].'"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-danger btnEliminarProductos" idProducto="'.$datos["id"].'"><i class="fa fa-close"></i></button>
                    
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




  



<!-- ventana modal Ingresar productos -->
   <div id="modalProductos" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Agregar Producto</h4>

            </div>
            <div class="modal-body">
              <div class="box-body">

              <!-- ingresar categoria -->
              <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                    <select class="form-control input-lg" name="categoria">
                      <?php
                      $categorias = ControladorCategorias::ctrMostrarCategorias(null,null);
                      
                      foreach ($categorias as $key => $cate) {
                        
                        
                        echo '
                            <option value='.$cate["nombre"].'>'.$cate["nombre"].'</option>
                        
                        
                        ';
                      }
                       ?>
                        

                    </select>

                  </div>

                </div>


              <!-- Ingresar nombre -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-list"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingrese Nombre">

                  </div>

                </div>
<!-- 
                ingresar descripcion -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoDescripcion" placeholder="Ingrese Descripción">

                  </div>

                </div>

<!-- 
                ingresar precio compra -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                    <input type="number" class="form-control input-lg" min="1" name="nuevoPrecioCompra" placeholder="Ingrese Precio de Compra">

                  </div>

                </div>


                <!-- ingresar Precio venta -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                    <input type="number" class="form-control input-lg" min="1" name="nuevoPrecioVenta" placeholder="Ingrese Precio de Venta">

                  </div>

                </div>


                <!-- ingresar stock -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                    <input type="number" class="form-control input-lg" min="1" name="nuevoStock" placeholder="Ingrese Stock">

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

        $crearProducto = new ControladorProductos();
        $crearProducto->ctrCrearProductos();
        
        ?>


      </div>

    </div>

   </div>


   <!-- ventana modal Editar productos -->
   <div id="modalEditarProductos" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editar Productos</h4>

            </div>
            <div class="modal-body">
              <div class="box-body">

                <!-- editar categoria -->
              <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                    <input type="hidden" name="id" id="id">
                    <select class="form-control input-lg" name="editarCategoria">
                      <?php
                      $categorias = ControladorCategorias::ctrMostrarCategorias(null,null);
                      
                      foreach ($categorias as $key => $cate) {
                        
                        
                        echo '
                            <option id="editarCategoria"></option>
                            <option value='.$cate["nombre"].'>'.$cate["nombre"].'</option>
                        
                        ';
                      }
                       ?>
                        

                    </select>

                  </div>

                </div>


              <!-- Ingresar nombre -->
                <div class="form-group">
                <label>Nombre:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-list"></i></span>
                    <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre">

                  </div>

                </div>
<!-- 
                ingresar descripcion -->
                <div class="form-group">
                <label>Descripción:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion">

                  </div>

                </div>

<!-- 
                ingresar precio compra-->
                <div class="form-group">
                <label>Precio Compra:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                    <input type="number" class="form-control input-lg" min="1" name="editarPrecioCompra" id="editarPrecioCompra">

                  </div>

                </div>


                <!-- 
                ingresar precio venta-->
                <div class="form-group">
                <label>Precio Venta:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                    <input type="number" class="form-control input-lg" min="1" name="editarPrecioVenta" id="editarPrecioVenta">

                  </div>

                </div>


                <!-- 
                ingresar stock-->
                <div class="form-group">
                <label>Stock:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                    <input type="number" class="form-control input-lg" min="1" name="editarStock" id="editarStock">

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

         $editarProductos = new ControladorProductos();
         $editarProductos->ctrEditarProductos();
        
        ?>


      </div>

    </div>

   </div>




   <!-- ventana modal Ingresar productos -->
   <div id="modalProductos" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Agregar Producto</h4>

            </div>
            <div class="modal-body">
              <div class="box-body">

              <!-- ingresar categoria -->
              <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                    <select class="form-control input-lg" name="categoria">
                      <?php
                      $categorias = ControladorCategorias::ctrMostrarCategorias(null,null);
                      
                      foreach ($categorias as $key => $cate) {
                        
                        
                        echo '
                            <option value='.$cate["nombre"].'>'.$cate["nombre"].'</option>
                        
                        
                        ';
                      }
                       ?>
                        

                    </select>

                  </div>

                </div>


              <!-- Ingresar nombre -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-list"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingrese Nombre">

                  </div>

                </div>
<!-- 
                ingresar descripcion -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoDescripcion" placeholder="Ingrese Descripción">

                  </div>

                </div>

<!-- 
                ingresar precio compra -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                    <input type="number" class="form-control input-lg" min="1" name="nuevoPrecioCompra" placeholder="Ingrese Precio de Compra">

                  </div>

                </div>


                <!-- ingresar Precio venta -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                    <input type="number" class="form-control input-lg" min="1" name="nuevoPrecioVenta" placeholder="Ingrese Precio de Venta">

                  </div>

                </div>


                <!-- ingresar stock -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                    <input type="number" class="form-control input-lg" min="1" name="nuevoStock" placeholder="Ingrese Stock">

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

        $crearProducto = new ControladorProductos();
        $crearProducto->ctrCrearProductos();
        
        ?>


      </div>

    </div>

   </div>





   <!-- ventana modal ENTRADA de productos -->
   <div id="modalEntradaProductos" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Entrada Stock</h4>

            </div>
            <div class="modal-body">
              <div class="box-body">

                <!-- editar categoria -->
              <div class="form-group">
                  <div class="input-group">
                    
                    <input type="hidden" name="id" id="id">

                  </div>

                </div>


              <!-- Ingresar nombre empresa -->
                <div class="form-group">
                
                    <input type="text" class="form-control input-lg" name="nombreEmpresa" id="nombreEmpresa">

                </div>

                <!-- Ingresar tipo empresa -->
                <div class="form-group">
                
                    <input type="text" class="form-control input-lg" name="tipoEmpresa" id="tipoEmpresa">

                </div>

                <!-- Ingresar nombre de producto -->
                <div class="form-group">
                
                    <input type="text" class="form-control input-lg" name="nombreProducto" id="nombreProducto">

                </div>

                <!-- ingresar stock -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                    <input type="number" class="form-control input-lg" min="1" name="entradaStock" id="entradaStock" placeholder="Número de Stock">

                  </div>

                </div>

                
                

                    <!-- botones de acciones -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>

                </div>






              </div>

            </div>


        </form>


        <?php 

        //  $editarProductos = new ControladorProductos();
        //  $editarProductos->ctrEditarProductos();
        
        ?>


      </div>

    </div>

   </div>





   <!-- ventana modal SALIDA de productos -->
   <div id="modalSalidaProductos" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Salida Stock</h4>

            </div>
            <div class="modal-body">
              <div class="box-body">

                <!-- editar categoria -->
              <div class="form-group">
                  <div class="input-group">
                    
                    <input type="hidden" name="id" id="id">

                  </div>

                </div>


              <!-- Ingresar cetgoria -->
                <div class="form-group">
                
                    <input type="text" class="form-control input-lg" name="categoriap" id="categoriap">

                </div>

                <!-- Ingresar nombre del prodcuto -->
                <div class="form-group">
                
                    <input type="text" class="form-control input-lg" name="nombreProducto" id="nombreProducto">

                </div>

                <!-- Ingresar nombre del Cliente -->
                <div class="form-group">
                
                    <input type="text" class="form-control input-lg" name="nombreCliente" id="nombreCliente">

                </div>

                <!-- ingresar nombre del Cliente -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                    <input type="number" class="form-control input-lg" min="1" name="salidaStock" id="salidaStock" placeholder="Salidas de Stock">

                  </div>

                </div>

                
                

                    <!-- botones de acciones -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>

                </div>






              </div>

            </div>


        </form>


        <?php 

        //  $editarProductos = new ControladorProductos();
        //  $editarProductos->ctrEditarProductos();
        
        ?>


      </div>

    </div>

   </div>











   <?php 

        $EliminarProducto = new ControladorProductos();
        $EliminarProducto->ctrBorrarProductos();
        
        ?>





 



