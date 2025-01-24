<?php
require_once "../../../controlador/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

class ImprimirUsuarios {

    public function TraerUsuarios() {
        $item = null;
        $valor = null;

        // Establecer zona horaria de Mexico, ya que si no se especifica no se refleja el cambio de horario
        date_default_timezone_set('America/Mexico_City');
        $fecha = date('Y-m-d');

        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        require_once "../tcpdf.php";

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);

        $pdf->startPageGroup();
        $pdf->AddPage();


        // seccion donde va la informacion en la hoja pdf

        $bloque = '
        <table>
            <tr>
                <!-- Celda izquierda con información alineada a la izquierda -->
                <td style="background-color:white; text-align:left; width:100%; padding:0; margin:0;">
                    <div style="font-size:8.5px; line-height:15px;">
                        <strong>Dirección:</strong> Calle 35 x 22 S/N Colonia San Marcos, Izamal, Yucatán
                        <br>
                        <strong>Facebook:</strong> "Jardín de Edith": https://www.facebook.com/share/15tW4QVmPa/
                        <br>
                        <strong>Fecha:</strong> ' . $fecha . '  
                    </div>
                </td>
            </tr>
        </table>

        <br>

        <h3 style="text-align:center;">Reporte de Usuarios</h3>



        <!-- maquetando la tabla con los datos para el pdf -->
        <table style="font-size:10px; padding:5px 10px;">
        <tr>

        <th style="border:1px solid #666; background-color:white; width:40px; font-size:12px; color:black; font-weight:bold;">id</th>

        <th style="border:1px solid #666; background-color:white; width:125px; font-size:12px; color:black; font-weight:bold;">Nombre</th>

        <th style="border:1px solid #666; background-color:white; width:125px; font-size:12px; color:black; font-weight:bold;">Usuario</th>

        <th style="border:1px solid #666; background-color:white; width:100px; font-size:12px; color:black; font-weight:bold;">Perfil</th>

        <th style="border:1px solid #666; background-color:white; width:150px; font-size:12px; color:black; font-weight:bold;">Fecha de Registro</th>

        </tr>
        </table>';

        //  Termina seccion donde va la informacion en la hoja pdf



        $pdf->writeHTML($bloque, false, false, false, false, '');


        foreach ($usuarios as $key => $valueDatos) {
            
            $html = '<table style="font-size:10px; padding:5px 10px;">

            <tr>

            <td style="border:1px solid #666; background-color:white; width:40px;">
            '.$valueDatos["id"].'
            </td>
            <td style="border:1px solid #666; background-color:white; width:125px;">
            '.$valueDatos["nombre"].'
            </td>
            <td style="border:1px solid #666; background-color:white; width:125px;">
            '.$valueDatos["usuario"].'
            </td>
            <td style="border:1px solid #666; background-color:white; width:100px;">
            '.$valueDatos["perfil"].'
            </td>
            <td style="border:1px solid #666; background-color:white; width:150px;">
            '.$valueDatos["fecha"].'
            </td>

            
            </tr>
            
            </table>
            
            
            ';


            $pdf->writeHTML($html,false,false,false,false,'');


        }



        $pdf->Output('usuarios.pdf');
    }
}

$usuarios = new ImprimirUsuarios();
$usuarios->TraerUsuarios();


?>
