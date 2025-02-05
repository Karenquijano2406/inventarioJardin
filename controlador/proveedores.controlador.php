<?php 

class ControladorProveedores {

    static public function ctrMostrarProveedores($item, $valor) {
        $tabla = "proveedores";
        $respuesta = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $valor);
        return $respuesta;
    }


    static public function ctrCrearProveedores() {
        if (isset($_POST["nuevoEmpresa"])) {
            $tabla = "proveedores";

           

            $datos = array(
                "empresa" => $_POST['nuevoEmpresa'],
                "tipoEmpresa" => $_POST['TipoEmpresa'],
                "correo" => $_POST['nuevoCorreo'],
                "telefono" => $_POST['nuevoTelefono'],
                "direccion" => $_POST['nuevoDireccion']
            );

            $respuesta = ModeloProveedores::mdlIngresarProveedores($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "El proveedor ha sido guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "proveedores";
                        }
                    });
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "El proveedor no ha sido guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "proveedor";
                        }
                    });
                </script>';
            }
        }



        
    }

    static public function ctrEditarProveedores() {
        if (isset($_POST["editarEmpresa"])) {
            $tabla = "proveedores";

           

            $datos = array("id" => $_POST['id'],
                "empresa" => $_POST['editarEmpresa'],
                "tipoEmpresa" => $_POST['editarTipoEmpresa'],
                "correo" => $_POST['editarCorreo'],
                "telefono" => $_POST['editarTelefono'],
                "direccion" => $_POST['editarDireccion']
            );

            $respuesta = ModeloProveedores::mdlEditarProveedores($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "El proveedor ha sido editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "proveedores";
                        }
                    });
                </script>';

            }else {

                echo '<script>
                    swal({
                        type: "error",
                        title: "El proveedor no ha sido editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "proveedores";
                        }
                    });
                </script>';
                
            }

        }


    }



    static public function ctrBorrarProveedores(){

        if (isset($_GET['idProveedores'])) {
            
            $tabla = "proveedores";
            $datos = $_GET['idProveedores'];

            $respuesta = ModeloProveedores::mdlBorrarProveedores($tabla,$datos);

            if ($respuesta == "ok") {
                
                echo '<script>
                    swal({
                        type: "success",
                        title: "El proveedor ha sido eliminado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "proveedores";
                        }
                    });
                </script>';

            }
        }


    }



    public function ctrDescargarReportesExcelProveedores() {
        if (isset($_GET["proveedoresExcel"])) {
            
            $tabla = "proveedores";
            $item = null;
            $valor = null;
    
            // Obtener los clientes desde el modelo
            $proveedores = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $valor);
        }
    
        // Nombre del archivo Excel a generar
        $name = $_GET["proveedoresExcel"] . '.xls';
    
        // Configuración de los encabezados HTTP para descarga de archivo Excel
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
        // Iniciar la tabla y definir los encabezados de las columnas
        echo utf8_decode("<table border='1'>
            <tr>
                <td style='text-align:center; font-weight:bold;'>Empresa</td>
                <td style='text-align:center; font-weight:bold;'>Tipo de Empresa</td>
                <td style='text-align:center; font-weight:bold;'>Correo Electrónico</td>
                <td style='text-align:center; font-weight:bold;'>Teléfono</td>
                <td style='text-align:center; font-weight:bold;'>Direccion</td>
            </tr>");
    
        // Recorrer los usuarios y generar las filas de la tabla
        foreach ($proveedores as $key => $datos) {
            echo utf8_decode("<tr>
                <td style='text-align:center;'>" . $datos["empresa"] . "</td>
                <td style='text-align:center;'>" . $datos["tipoEmpresa"] . "</td>
                <td style='text-align:center;'>" . $datos["correo"] . "</td>
                <td style='text-align:center;'>" . $datos["telefono"] . "</td>
                <td style='text-align:center;'>" . $datos["direccion"] . "</td>
            </tr>");
        }
    
        // Cerrar la tabla
        echo "</table>";
        exit(); // Para evitar que el script continúe ejecutándose después de la exportación
    }





    public function ctrDescargarReportesWordProveedores() {
        if (isset($_GET["proveedoresWord"])) {
            
            $tabla = "proveedores";
            $item = null;
            $valor = null;
    
            // Obtener los clientes desde el modelo
            $proveedores = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $valor);
        }
    
        // Nombre del archivo Word a generar
        $name = $_GET["proveedoresWord"] . '.doc';
    
        // Configuración de los encabezados HTTP para descarga de archivo Word
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: application/vnd.ms-doc');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
        // Iniciar la tabla y definir los encabezados de las columnas
        echo utf8_decode("<table border='1'>
            <tr>
                <td style='text-align:center; font-weight:bold;'>Empresa</td>
                <td style='text-align:center; font-weight:bold;'>Tipo de Empresa</td>
                <td style='text-align:center; font-weight:bold;'>Correo Electrónico</td>
                <td style='text-align:center; font-weight:bold;'>Teléfono</td>
                <td style='text-align:center; font-weight:bold;'>Dirección</td>
            </tr>");
    
        // Recorrer los clientes y generar las filas de la tabla
        foreach ($proveedores as $key => $datos) {
            echo utf8_decode("<tr>
                <td style='text-align:center;'>" . $datos["empresa"] . "</td>
                <td style='text-align:center;'>" . $datos["tipoEmpresa"] . "</td>
                <td style='text-align:center;'>" . $datos["correo"] . "</td>
                <td style='text-align:center;'>" . $datos["telefono"] . "</td>
                <td style='text-align:center;'>" . $datos["direccion"] . "</td>
            </tr>");
        }
    
        // Cerrar la tabla
        echo "</table>";
        exit(); // Para evitar que el script continúe ejecutándose después de la exportación
    }




    public function ctrDescargarReportesCSVProveedores() {
        if (isset($_GET["proveedoresCSV"])) {
            $tabla = "proveedores";
            $item = null;
            $valor = null;
    
            // Obtener los proveedores desde el modelo
            $proveedores = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $valor);
        }
    
        // Nombre del archivo CSV
        $name = $_GET["proveedoresCSV"] . '.csv';
    
        // Configuración de los encabezados HTTP
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
        // Crear contenido del CSV
        $datos = "";
        $datos .= "EMPRESA,TIPO DE EMPRESA,CORREO ELECTRÓNICO,TELÉFONO,DIRECCIÓN\r\n";
    
        foreach ($proveedores as $key => $values) {
            $datos .= "$values[empresa],$values[tipoEmpresa],$values[correo],$values[telefono],$values[direccion]\r\n";
        }
    
        echo utf8_decode($datos);
        exit();
    }
    
    
    



    
}
