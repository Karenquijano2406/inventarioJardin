<?php  
$item = null;
$valor = null;


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



<!-- Tabla debajo de las cajas -->
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
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Precio Venta</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="#">OR9842</a></td>
                        <td>Call of Duty IV</td>
                        <td><span class="label label-success">Shipped</span></td>
                        <td>90%</td>
                    </tr>
                    <tr>
                        <td><a href="#">OR1848</a></td>
                        <td>Samsung Smart TV</td>
                        <td><span class="label label-warning">Pending</span></td>
                        <td>85%</td>
                    </tr>
                    <tr>
                        <td><a href="#">OR7429</a></td>
                        <td>iPhone 6 Plus</td>
                        <td><span class="label label-danger">Delivered</span></td>
                        <td>78%</td>
                    </tr>
                    <tr>
                        <td><a href="#">OR7429</a></td>
                        <td>Samsung Smart TV</td>
                        <td><span class="label label-info">Processing</span></td>
                        <td>82%</td>
                    </tr>
                    <tr>
                        <td><a href="#">OR1848</a></td>
                        <td>Samsung Smart TV</td>
                        <td><span class="label label-warning">Pending</span></td>
                        <td>88%</td>
                    </tr>
                    <tr>
                        <td><a href="#">OR7429</a></td>
                        <td>iPhone 6 Plus</td>
                        <td><span class="label label-danger">Delivered</span></td>
                        <td>74%</td>
                    </tr>
                    <tr>
                        <td><a href="#">OR9842</a></td>
                        <td>Call of Duty IV</td>
                        <td><span class="label label-success">Shipped</span></td>
                        <td>92%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="box-footer clearfix">
        <a href="#" class="btn btn-sm btn-info btn-flat pull-left">Productos</a>
        <a href="#" class="btn btn-sm btn-default btn-flat pull-right">Ver todos los productos</a>
    </div>
</div>
