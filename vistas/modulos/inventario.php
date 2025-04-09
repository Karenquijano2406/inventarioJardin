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
                            <div style="margin-top: 5px;" class="emoji">'.$mensajeCaducidad.'</div> <!-- Aquí está el emoji dinámico -->
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
// Función para actualizar el estado de caducidad cuando se carga la página
$(document).ready(function() {
  $(".fechaCaducidad").each(function() {
    let fecha = $(this).val();
    let idProducto = $(this).data("id");
    let mensajeCaducidad = '';
    let fechaHoy = new Date();
    let fechaCaducidadObj = new Date(fecha);

    // Si hay fecha de caducidad
    if (fecha) {
      let diferencia = (fechaCaducidadObj - fechaHoy) / (1000 * 60 * 60 * 24); // Diferencia en días

      if (diferencia < 0) {
        mensajeCaducidad = "🛑 <small>Caducado</small>";
      } else if (diferencia <= 7) {
        mensajeCaducidad = "⏳ <small>Pronto a caducar</small>";
      } else {
        mensajeCaducidad = "✅ <small>Vigente</small>";
      }
    } else {
      mensajeCaducidad = "❓ <small>Sin fecha</small>";
    }

    // Actualizamos el mensaje en la columna de Estado
    $(this).closest("tr").find(".emoji").html(mensajeCaducidad);
  });
});

// Lógica para manejar el cambio de fecha por parte del usuario
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

  // Lógica para cambiar el emoji dependiendo de la nueva fecha
  let fechaCaducidad = new Date(fecha);
  let fechaHoy = new Date();
  let diffTime = fechaCaducidad - fechaHoy;
  let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
  let emojiContainer = $(this).closest("tr").find(".emoji");

  // Actualizar el emoji después de cambiar la fecha
  if (diffDays <= 7 && diffDays > 0) {
    emojiContainer.html("⏳ <small>Pronto a caducar</small>");
  } else if (diffDays <= 0) {
    emojiContainer.html("🛑 <small>Caducado</small>");
  } else {
    emojiContainer.html("✅ <small>Vigente</small>");
  }
});
</script>
