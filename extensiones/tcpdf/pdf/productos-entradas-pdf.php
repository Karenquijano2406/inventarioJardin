<?php
require_once "../../../controlador/productos.controlador.php";
require_once "../../../controlador/empresa.controlador.php";


require_once "../../../modelos/productos.modelo.php";
require_once "../../../modelos/empresa.modelo.php";

class ImprimirProductos {

    public function TraerProductos() {
        $item = null;
        $valor = null;

        // Establecer zona horaria de Mexico, ya que si no se especifica no se refleja el cambio de horario
        date_default_timezone_set('America/Mexico_City');
        $fecha = date('Y-m-d');

        $productos = ControladorProductos::ctrMostrarProductosEntradas($item, $valor);
        $empresa = ControladorEmpresa::ctrMostrarEmpresa($item, $valor);

        require_once "../tcpdf.php";

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);

        $pdf->startPageGroup();
        $pdf->AddPage();

        // Ruta del logo (asegúrate de usar la ruta correcta de tu logo)
        $logoPath = "../../../vistas/dist/img/logoJardin.jpg";  // Ajusta la ruta a tu imagen

        // Verifica si la imagen existe
        if (file_exists($logoPath)) {
            // Agregar el logo en la parte derecha
            $pdf->Image($logoPath, 170, 10, 30, 30, 'JPG');  // Ajusta el formato de la imagen (JPG)
        } else {
            // Si no existe la imagen, mostrar un error en el PDF
            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Text(10, 20, 'Error: Logo no encontrado.');
        }

        // seccion donde va la informacion en la hoja pdf
        foreach ($empresa as $key => $valores) {
            # code...
        }

        $bloque = '
        <table>
            <tr>
                <!-- Celda izquierda con información alineada a la izquierda -->
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

        <h3 style="text-align:center;">Reporte de Entradas de Productos</h3>


        <!-- maquetando la tabla con los datos para el pdf -->
        <table style="font-size:10px; padding:5px 10px;">
        <tr>
        <th style="border:1px solid #666; background-color:white; width:120px; font-size:12px; color:black; font-weight:bold;">Nombre Empresa</th>
        <th style="border:1px solid #666; background-color:white; width:120px; font-size:12px; color:black; font-weight:bold;">Tipo Empresa</th>
        <th style="border:1px solid #666; background-color:white; width:120px; font-size:12px; color:black; font-weight:bold;">Nombre Producto</th>
        <th style="border:1px solid #666; background-color:white; width:70px; font-size:12px; color:black; font-weight:bold;">Entrada</th>
        <th style="border:1px solid #666; background-color:white; width:100px; font-size:12px; color:black; font-weight:bold;">Fecha</th>
        </tr>
        </table>';

        //  Termina seccion donde va la informacion en la hoja pdf

        $pdf->writeHTML($bloque, false, false, false, false, '');

        foreach ($productos as $key => $valueDatos) {
            
            $html = '<table style="font-size:10px; padding:5px 10px;"> 
            <tr>
            <td style="border:1px solid #666; background-color:white; width:120px;">
            '.$valueDatos["nombreEmpresa"].'
            </td>
            <td style="border:1px solid #666; background-color:white; width:120px;">
            '.$valueDatos["tipoEmpresa"].'
            </td>
            <td style="border:1px solid #666; background-color:white; width:120px;">
            '.$valueDatos["nombreProducto"].'
            </td>
            <td style="border:1px solid #666; background-color:white; width:70px;">
            '.$valueDatos["entradap"].'
            </td>
            <td style="border:1px solid #666; background-color:white; width:100px;">
            '.$valueDatos["fecha"].'
            </td>
            </tr>
            </table>';
            
            $pdf->writeHTML($html,false,false,false,false,'');
        }

        $pdf->Output('productosEntrada.pdf');
    }
}

$productos = new ImprimirProductos();
$productos->TraerProductos();
?>

