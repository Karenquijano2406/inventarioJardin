<?php
require_once "../../../controlador/productos.controlador.php";
require_once "../../../controlador/empresa.controlador.php";


require_once "../../../modelos/productos.modelo.php";
require_once "../../../modelos/empresa.modelo.php";

class ImprimirProductos {

    public function TraerProductos() {
        $item = null;
        $valor = null;

        // Establecer zona horaria de Mexico
        date_default_timezone_set('America/Mexico_City');
        $fecha = date('Y-m-d');

        $productos = ControladorProductos::ctrMostrarProductos($item, $valor);
        $empresa = ControladorEmpresa::ctrMostrarEmpresa($item, $valor);

        require_once "../tcpdf.php";

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);

        $pdf->startPageGroup();
        $pdf->AddPage('L', 'A4');  // Página en formato horizontal (Landscape)

        // Ruta del logo
        $logoPath = "../../../vistas/dist/img/logoJardin.jpg";  // Ajusta la ruta a tu imagen

        // Verifica si la imagen existe
        if (file_exists($logoPath)) {
            // Ajustamos la posición del logo en la esquina superior derecha
            $pdf->Image($logoPath, 250, 10, 40, 40, 'JPG');  // Ajusta las coordenadas y tamaño (250, 10) es la posición y (40, 40) es el tamaño
        } else {
            // Si no existe la imagen, mostrar un error en el PDF
            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Text(10, 20, 'Error: Logo no encontrado.');
        }

        // Sección donde va la información de la empresa
        foreach ($empresa as $key => $valores) {
            # code...
        }

        $bloque = '
        <table>
            <tr>
                <td style="background-color:white; text-align:left; width:100%; padding:0; margin:0;">
                    <div style="font-size:8.5px; line-height:15px;">
                        <strong>Empresa:</strong> '.$valores["nombre"].'
                        <br>
                        <strong>Dirección:</strong> '.$valores["direccion"].'
                        <br>
                        <strong>Sitio Web:</strong> '.$valores["sitioweb"].'
                        <br>
                        <strong>Teléfono:</strong> '.$valores["telefono"].'
                        <br>
                        <strong>Fecha:</strong> ' . $fecha . '  
                    </div>
                </td>
            </tr>
        </table>

        <br>

        <h3 style="text-align:center;">Reporte de Productos</h3>

        <!-- Maquetando la tabla con los datos para el PDF -->
        <table style="font-size:10px; padding:5px 10px;">
        <tr>
        <th style="border:1px solid #666; background-color:white; width:160px; font-size:12px; color:black; font-weight:bold;">Categoría</th>
        <th style="border:1px solid #666; background-color:white; width:160px; font-size:12px; color:black; font-weight:bold;">Nombre</th>
        <th style="border:1px solid #666; background-color:white; width:160px; font-size:12px; color:black; font-weight:bold;">Descripción</th>
        <th style="border:1px solid #666; background-color:white; width:100px; font-size:12px; color:black; font-weight:bold;">Precio Compra</th>
        <th style="border:1px solid #666; background-color:white; width:100px; font-size:12px; color:black; font-weight:bold;">Precio Venta</th>
        <th style="border:1px solid #666; background-color:white; width:100px; font-size:12px; color:black; font-weight:bold;">Stock</th>
        </tr>
        </table>';

        //  Termina sección donde va la información en la hoja PDF

        $pdf->writeHTML($bloque, false, false, false, false, '');

        foreach ($productos as $key => $valueDatos) {
            
            $html = '<table style="font-size:10px; padding:5px 10px;"> 
            <tr>
            <td style="border:1px solid #666; background-color:white; width:160px;">
            '.$valueDatos["categoria"].'
            </td>
            <td style="border:1px solid #666; background-color:white; width:160px;">
            '.$valueDatos["nombre"].'
            </td>
            <td style="border:1px solid #666; background-color:white; width:160px;">
            '.$valueDatos["descripcion"].'
            </td>
            <td style="border:1px solid #666; background-color:white; width:100px;">$
            '.$valueDatos["precioCompra"].'
            </td>
            <td style="border:1px solid #666; background-color:white; width:100px;">$
            '.$valueDatos["precioVenta"].'
            </td>
            <td style="border:1px solid #666; background-color:white; width:100px;">
            '.$valueDatos["stock"].'
            </td>
            </tr>
            </table>';
            
            $pdf->writeHTML($html,false,false,false,false,'');
        }

        $pdf->Output('productos.pdf');
    }
}

$productos = new ImprimirProductos();
$productos->TraerProductos();
?>
