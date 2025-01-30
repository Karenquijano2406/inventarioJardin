<?php
include "controlador/plantilla.controlador.php";
include "controlador/usuarios.controlador.php";
include "controlador/empresa.controlador.php";
include "controlador/categorias.controlador.php";


include "modelos/usuarios.modelo.php";
include "modelos/empresa.modelo.php";
include "modelos/categorias.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
