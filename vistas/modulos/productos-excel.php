<?php

require_once "../../controlador/productos.controlador.php";
require_once "../../modelos/productos.modelo.php";

$reporte = new ControladorProductos();
$reporte->ctrDescargarReportesExcelProductos();



?>