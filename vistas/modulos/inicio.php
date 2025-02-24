<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        
        

      <?php 

      if ($_SESSION['perfil'] == "Administrador") {

        include "inicio/cajasSuperiores.php";
      }



        
        
      ?>



        
      </div>



      <!-- para en inicio de sesion como Especial -->
    <div class="col-lg-12">
      <?php 
      if ($_SESSION['perfil'] == "Especial") {
        echo '<div class="box box-success">
          <div class="box-header">
            <h1 class="">Bienvenid@ '.$_SESSION["nombre"].'</h1>

          </div>

        </div>';
      }
      
      ?>


    </div>



      

   



    
    </section>



  

</div>