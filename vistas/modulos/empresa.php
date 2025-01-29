<div class="content-wrapper">
    <section class="content-header">
        <h1>Panel Empresa <small>Tabla Empresa</small></h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Empresa</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped tablas">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Sitio Web</th>
                            <th>Dirección</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $empresas = ControladorEmpresa::ctrMostrarEmpresa(null, null);
                        foreach ($empresas as $key => $empresa) {
                            echo '
                        <tr>
                            <td>'.($key+1).'</td>
                            <td>'.$empresa["nombre"].'</td>
                            <td>'.$empresa["telefono"].'</td>
                            <td>'.$empresa["sitioweb"].'</td>
                            <td>'.$empresa["direccion"].'</td>
                            <td class="text-nowrap">
                                <div class="btn-group">
                                    <button class="btn btn-primary btnEditarEmpresa" data-toggle="modal" data-target="#modalEditarEmpresa" idEmpresa="'.$empresa["id"].'">
                                        Editar
                                    </button>
                                   <!--- <button class="btn btn-danger btnEliminarEmpresa" idEmpresa="'.$empresa["id"].'">  
                                        Eliminar
                                    </button>   --->
                                </div>
                            </td>
                        </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- Modal Editar Empresa -->
<div id="modalEditarEmpresa" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Empresa</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idEmpresa" id="idEmpresa">

                    <!-- ingresar nombre de la empresa -->
                        <div class="form-group">
                            <label>Nombre:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                <input type="text" class="form-control input-lg" name="editarEmpresa" id="editarEmpresa">
                            </div>
                        </div>

                            <!-- ingresar Tel -->
                                <div class="form-group">
                                    <label>Teléfono:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono">
                                    </div>
                                </div>

                                <!-- ingresar sitio web -->
                                <div class="form-group">
                                    <label>Sitio Web:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                        <input type="text" class="form-control input-lg" name="editarSitioWeb" id="editarSitioWeb">
                                    </div>
                                </div>

                                <!-- ingresar direccion -->
                                <div class="form-group">
                                    <label>Dirección:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion">
                                    </div>
                                </div>



                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </form>

            <?php 
            $editarEmpresa = new ControladorEmpresa();
            $editarEmpresa->ctrEditarEmpresa();
            ?>
        </div>
    </div>
</div>
