<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="vistas/dist/img/logoJardin.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>El Jardín de Edith</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">


      
<!-- para las sesiones de Administrador y especial(no mostrar todos los modulos) -->
      <?php

      if ($_SESSION['perfil'] == "Administrador") {

        echo'
              <li>
          <a href="inicio">
            <i class="fa fa-home"></i> <span>Inicio</span>
            <span class="pull-right-container">
            </span>
          </a>
      </li>
      <li>
          <a href="empresa">
          <i class="fa fa-building"></i> <span>Empresa</span>
          <span class="pull-right-container">
          </span>
          </a>
      </li>
      <li>
          <a href="categorias">
          <i class="fa fa-th"></i> <span>Categorías</span>
          <span class="pull-right-container">
          </span>
          </a>
      </li>
        <li>
          <a href="usuarios">
            <i class="fa fa-users"></i> <span>Usuarios</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        ';
      }

       ?>

       

       <?php
       if ($_SESSION["perfil"] == "Administrador" || $_SESSION['perfil'] == "Especial") {

        echo'
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Almacén</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="productos"><i class="fa fa-circle-o"></i> Productos</a></li>
            <li><a href="p-entradas"><i class="fa fa-circle-o"></i> Productos de Entrada</a></li>
            <li><a href="p-salidas"><i class="fa fa-circle-o"></i> Productos de Salida</a></li>
            <li><a href="inventario"><i class="fa fa-circle-o"></i> Inventario</a></li>
          </ul>
        </li>
        
        
        ';      
       }

       ?>


       <?php 
       if ($_SESSION["perfil"] == "Administrador") {

        echo '
        <li>
              
          <a href="clientes">
          <i class="fa fa-user"></i> <span>Clientes</span>
          <span class="pull-right-container">
          </span>
          </a>
      </li>
      <li>
          <a href="proveedores">
          <i class="fa fa-truck"></i> <span>Proveedores</span>
          <span class="pull-right-container">
          </span>
          </a>
      </li>
        
        
        ';
       }


       ?>
















        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>