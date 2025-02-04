<?php



session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventario | Jardín de Edith</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">



  <!-- ESTILOS css -->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->

  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="vistas/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="vistas/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">



 <!-- Fin de los  ESTILOS css -->




  <!-- ESTILOS js -->

  <!-- jQuery 3 -->
<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.7 -->
<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>




<!-- DataTables -->
<script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- SWEETALERT -->
<script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>


<!-- Morris.js charts -->
<script src="vistas/bower_components/raphael/raphael.min.js"></script>
<script src="vistas/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="vistas/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="vistas/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="vistas/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="vistas/bower_components/moment/min/moment.min.js"></script>
<script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="vistas/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="vistas/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="vistas/dist/js/demo.js"></script>

<!-- Fin de los ESTILOS js -->


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<!-- aqui empieza el cuerpo del proyecto, es decir en el body -->
<body class="hold-transition skin-blue sidebar-mini login-page">
    








<?php 

if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok") {
    

    echo '<div class="wrapper">';


include "modulos/header.php";
// include "modulos/inicio/cajasSuperiores.php";
include "modulos/menu.php";

if (isset($_GET["ruta"])) {
    
    if ($_GET['ruta'] == "ingreso" || 
        $_GET['ruta'] == "inicio" ||
        $_GET['ruta'] == "usuarios" ||
        $_GET['ruta'] == "empresa" ||
        $_GET['ruta'] == "categorias" ||
        $_GET['ruta'] == "clientes" ||
        $_GET['ruta'] == "proveedores" ||
        $_GET['ruta'] == "salir" ) {
        
        include "modulos/".$_GET["ruta"].".php";

    }else {

        include "modulos/404.php";

    }
}else {

    include "modulos/inicio.php";
}


include "modulos/footer.php";

    
}else {
    
    include "modulos/login.php";
}

?>

</div>
<!-- ./wrapper -->


<!-- llamando archivos.js -->
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/logos.js"></script>
<script src="vistas/js/empresa.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/proveedores.js"></script>







  



</body>
</html>
