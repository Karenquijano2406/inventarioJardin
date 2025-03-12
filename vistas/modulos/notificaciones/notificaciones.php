<?php 
if ($_SESSION['perfil'] != "Administrador") {
    return;
}

$item = null;
$valor = null;

$notificaciones = ControladorNotificaciones::ctrMostrarNotificaciones($item,$valor);
$suma = ControladorNotificaciones::ctrSumaNotificaciones();

?>

<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o" style="font-size: 20px;"></i>



              <span class="label label-warning"><?php echo $suma["totalvalor"]; ?></span>


            </a>


            <ul class="dropdown-menu">

            
              <li class="header">Tu tienes <?php echo $suma["totalvalor"]; ?> notificaciones</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">


                <?php 
                foreach ($notificaciones as $key => $valorN) {
                    $item = "id";
                    $valor = $valorN["idproducto"];

                    $pro = ControladorProductos::ctrMostrarProductos($item,$valor);


                    

                
                    echo '

                    <li>
                    <a href="productos" class="actualizarnotificaciones" item="valorStock">
                    <i class="fa fa-product-hunt text-red"></i>

                      El producto '.$pro["nombre"].' <br> le quedan '.$pro["stock"].' existencias <br> ¡Es hora de hacer compras! <br>



                    </a>
                    </li>

                    ';
                    // }
                    


                }
                ?>




                  
                  
                </ul>
              </li>
              <li class="footer"><a href="productos">Ver Todo</a></li>
            </ul>
          </li>