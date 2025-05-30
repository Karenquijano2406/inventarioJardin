<?php  
$item = null;
$valor = null;

// para que me traiga los valores a las cajas de inicio
$usuarios = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);
$totalusuarios = count($usuarios);

$categorias = ControladorCategorias::ctrMostrarCategorias($item,$valor);
$totalcategorias = count($categorias);

$clientes = ControladorClientes::ctrMostrarClientes($item,$valor);
$totalclientes = count($clientes);


$proveedores = ControladorProveedores::ctrMostrarProveedores($item,$valor);
$totalproveedores = count($proveedores);

?>


<div class="row" style="margin: 10px;">
    <!-- Cajas Superiores -->
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo $totalusuarios;?></h3>
                <p>Usuarios</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="usuarios" class="small-box-footer">Usuarios<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo $totalcategorias;?></h3>
                <p>Categorías</p>
            </div>
            <div class="icon">
                <i class="fa fa-th-list"></i>
            </div>
            <a href="categorias" class="small-box-footer">Categorías<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo $totalclientes;?></h3>
                <p>Clientes</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="clientes" class="small-box-footer">Clientes<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php echo $totalproveedores;?></h3>
                <p>Proveedores</p>
            </div>
            <div class="icon">
                <i class="fa fa-truck"></i>
            </div>
            <a href="proveedores" class="small-box-footer">Proveedores<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>











<!--  Tabla para Consultas -->
<!-- Sección para Consultas -->
<div class="box box-primary" style="margin: 20px; padding: 15px;">
    <div class="box-header with-border">
        <h3 class="box-title">Consultas de Productos</h3>
    </div>
    <div class="box-body">
        <form method="POST" action="">
            <div class="row">
                <!-- Selección de consulta -->
                <div class="col-md-4">
                    <label for="tipoConsulta">Tipo de consulta:</label>
                    <select class="form-control" name="tipoConsulta" id="tipoConsulta" required>
                        <option value="salidas">Producto con Mayor Registro de Salidas</option>
                        <option value="entradas">Historial de Entradas</option>
                        <option value="salidasHistorial">Historial de Salidas</option>
                    </select>
                </div>
                
                <!-- Rango de fechas -->
                <div class="col-md-3">
                    <label for="fechaInicio">Fecha inicio:</label>
                    <input type="date" class="form-control" name="fechaInicio" required>
                </div>
                <div class="col-md-3">
                    <label for="fechaFin">Fecha fin:</label>
                    <input type="date" class="form-control" name="fechaFin" required>
                </div>
                
                <!-- Botón de consulta -->
                <div class="col-md-2" style="margin-top: 25px;">
                    <button type="submit" class="btn btn-primary">Consultar</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Sección para mostrar resultados -->
<!-- Sección para mostrar resultados -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoConsulta = $_POST['tipoConsulta']; // Obtienes el tipo de consulta
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    
    if ($tipoConsulta == "salidas") {
        // Consulta de productos más vendidos
        $resultados = ControladorProductos::ctrProductosMasVendidos($fechaInicio, $fechaFin);
    } elseif ($tipoConsulta == "entradas") {
        // Consulta solo de entradas
        $resultados = ControladorProductos::ctrHistorialEntradas($fechaInicio, $fechaFin);
    } elseif ($tipoConsulta == "salidasHistorial") {
        // Consulta solo de salidas
        $resultados = ControladorProductos::ctrHistorialSalidas($fechaInicio, $fechaFin);
    }
    ?>
    <div class="box box-success" style="margin: 20px; padding: 15px;">
        <div class="box-header with-border">
            <h3 class="box-title">Resultados de la consulta</h3>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad Total</th>
                            <!-- <th>Fecha</th> -->
                            <th>Tipo de movimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($resultados)) {
                            foreach ($resultados as $resultado) {
                                if ($tipoConsulta == "entradas") {
                                    // Mostrar solo entradas
                                    echo "<tr>
                                            <td>{$resultado['producto']}</td>
                                            <td>{$resultado['cantidadEntrada']}</td>
                                            
                                            <td>Entrada</td>
                                        </tr>";
                                } elseif ($tipoConsulta == "salidasHistorial") {
                                    // Mostrar solo salidas
                                    echo "<tr>
                                            <td>{$resultado['producto']}</td>
                                            <td>{$resultado['cantidadSalida']}</td>
                                            
                                            <td>Salida</td>
                                        </tr>";
                                } else {
                                    // Es consulta de productos más vendidos
                                    echo "<tr>
                                            <td>{$resultado['producto']}</td>
                                            <td>{$resultado['cantidadVendida']}</td>
                                            
                                            <td>Venta</td>
                                        </tr>";
                                }
                            }
                        } else {
                            echo "<tr><td colspan='4' class='text-center'>No hay datos disponibles</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
?>



<!-- Tabla de prodcutos agregados recientemente debajo de las cajas -->
<div class="box box-info mt-3" style="margin: 20px; padding: 15px;">
    <div class="box-header with-border">
        <h3 class="box-title">Productos Agregados Recientemente</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body" style="padding: 10px;">
        <div class="table-responsive">
            <table class="table no-margin" style="margin: 10px; padding: 10px;">
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th>Nombre</th>
                        <th>Precio Compra</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $productos = ControladorProductos::ctrMostrarProductos(null, null);

                    if (!empty($productos)) {
                        // Obtener solo los últimos 3 productos agregados recientes
                        $ultimosProductos = array_slice($productos, -3);

                        foreach ($ultimosProductos as $producto) {
                            echo "<tr>
                                <td>{$producto['categoria']}</td>
                                <td>{$producto['nombre']}</td>
                                <td>$ {$producto['precioCompra']}</td>
                                <td>{$producto['stock']}</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>No hay productos recientes</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="box-footer clearfix">
        <a href="productos" class="btn btn-sm btn-info btn-flat pull-left">Productos</a>
        <a href="productos" class="btn btn-sm btn-default btn-flat pull-right">Ver todos los productos</a>
    </div>
</div>












