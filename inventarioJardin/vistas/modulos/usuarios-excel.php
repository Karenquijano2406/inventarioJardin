<?php

require_once "../../controlador/usuarios.controlador.php";
require_once "../../modelos/usuarios.modelo.php";

$reporte = new ControladorUsuarios();
$reporte->ctrDescargarReportesExcelUsuarios();



?>