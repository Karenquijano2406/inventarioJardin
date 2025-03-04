<?php
include "controlador/plantilla.controlador.php";
include "controlador/usuarios.controlador.php";
include "controlador/empresa.controlador.php";
include "controlador/categorias.controlador.php";
include "controlador/clientes.controlador.php";
include "controlador/proveedores.controlador.php";
include "controlador/productos.controlador.php";
include "controlador/notificaciones.controlador.php";


include "modelos/usuarios.modelo.php";
include "modelos/empresa.modelo.php";
include "modelos/categorias.modelo.php";
include "modelos/clientes.modelo.php";
include "modelos/proveedores.modelo.php";
include "modelos/productos.modelo.php";
include "modelos/notificaciones.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
