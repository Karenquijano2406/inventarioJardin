<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Panel Inventario
      <small>Tabla Inventario</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tabla Inventario</a></li>
      <li class="active">Inventario</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- //boton agregar usuarios -->
          <div class="box-header display">
          </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Inventario</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped tablas">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Caducidad</th>
                  </tr>
                </thead>

                <!-- CAMBIO 2 EN TODO EL TBODY -->
                <tbody>
                    <?php 
                    $productos = ControladorProductos::ctrMostrarProductos(null,null);
                    foreach ($productos as $key => $datos) {
                        // para darle color a los botones segun la cantidad de existencia
                        if ($datos["stock"] <= 3 ){
                            $stock = "<div class='btn btn-danger'>".$datos["stock"]."</div>";
                        } elseif ($datos["stock"] >= 4 && $datos["stock"] <= 10) { 
                            $stock = "<div class='btn btn-warning'>".$datos["stock"]."</div>";
                        } else {
                            $stock = "<div class='btn btn-success'>".$datos["stock"]."</div>";
                        }

                        // valor actual de la fecha de caducidad
                        $caducidad = $datos["caducidad"];
                        $mensajeCaducidad = '';
                        $fechaHoy = date("Y-m-d");

                        if ($caducidad) {
                            $fechaCaducidad = date("Y-m-d", strtotime($caducidad));
                            $diferencia = (strtotime($fechaCaducidad) - strtotime($fechaHoy)) / (60 * 60 * 24);

                            if ($diferencia < 0) {
                                $mensajeCaducidad = "🛑 <small>Caducado</small>";
                            } elseif ($diferencia <= 7) {
                                $mensajeCaducidad = "⏳ <small>Pronto a caducar</small>";
                            } else {
                                $mensajeCaducidad = "✅ <small>Vigente</small>";
                            }
                        } else {
                            $mensajeCaducidad = "❓ <small>Sin fecha</small>";
                        }

                        echo '
                        <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$datos["nombre"].'</td>
                          <td>'.$datos["descripcion"].'</td>
                          <td>'.$stock.'</td>
                          <td>
                            <input type="date" 
                                   class="form-control fechaCaducidad" 
                                   data-id="'.$datos["id"].'" 
                                   value="'.$caducidad.'">
                            <div style="margin-top: 5px;">'.$mensajeCaducidad.'</div>
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

<script>
$(document).on("change", ".fechaCaducidad", function() {
  let fecha = $(this).val();
  let idProducto = $(this).data("id");

  let datos = new FormData();
  datos.append("idProducto", idProducto);
  datos.append("fechaCaducidad", fecha);

  $.ajax({
    url: "ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta) {
      if (respuesta === "ok") {
        Swal.fire({
          icon: "success",
          title: "Fecha actualizada",
          text: "La fecha de caducidad ha sido guardada correctamente.",
          timer: 2000,
          showConfirmButton: false
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "No se pudo guardar la fecha.",
        });
      }
    }
  });
});
</script>
