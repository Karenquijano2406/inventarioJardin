<?php

require_once "../../controlador/clientes.controlador.php";
require_once "../../modelos/clientes.modelo.php";

$reporte = new ControladorClientes();
$reporte->ctrDescargarReportesExcelClientes();



?>