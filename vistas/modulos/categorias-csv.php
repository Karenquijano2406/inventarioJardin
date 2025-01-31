<?php

require_once "../../controlador/categorias.controlador.php";
require_once "../../modelos/categorias.modelo.php";

$reporte = new ControladorCategorias();
$reporte->ctrDescargarReportesCSVCategorias();



?>