<div class="login-box">
  <div class="login-logo">
    <!-- Reemplazamos el texto adminlte por el logo -->
    <a href="">
    <img src="vistas/dist/img/logoJardin.jpg" alt="Logo de la empresa" style="max-width: 150px; height: auto; margin: 0 auto;">
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar Sesión</p>

    <form action="" method="post">


      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name="IngUsuario">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="IngPassword">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>


      <div class="row">


        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        
        <!-- /.col -->
      </div>

    <?php 
    $login = new ControladorUsuarios();
    $login->ctrIngresoUsuario()
    
    
    ?>


    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
