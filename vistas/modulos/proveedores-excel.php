<?php

require_once "../../controlador/proveedores.controlador.php";
require_once "../../modelos/proveedores.modelo.php";

$reporte = new ControladorProveedores();
$reporte->ctrDescargarReportesExcelProveedores();



?>