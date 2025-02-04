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

    static public function ctrEditarClientes() {
        if (isset($_POST["editarNombre"])) {
            $tabla = "clientes";

            

            $datos = array("id" => $_POST['id'],
                "nombre" => $_POST['editarNombre'],
                "correo" => $_POST['editarCorreo'],
                "telefono" => $_POST['editarTelefono'],
                "direccion" => $_POST['editarDireccion']
            );

            $respuesta = ModeloClientes::mdlEditarClientes($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "El cliente ha sido editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "clientes";
                        }
                    });
                </script>';

            }else {

                echo '<script>
                    swal({
                        type: "error",
                        title: "El cliente no ha sido editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "clientes";
                        }
                    });
                </script>';
                
            }

        }


    }



    static public function ctrBorrarClientes(){

        if (isset($_GET['idCliente'])) {
            
            $tabla = "clientes";
            $datos = $_GET['idCliente'];

            $respuesta = ModeloClientes::mdlBorrarClientes($tabla,$datos);

            if ($respuesta == "ok") {
                
                echo '<script>
                    swal({
                        type: "success",
                        title: "El cliente ha sido eliminado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "clientes";
                        }
                    });
                </script>';

            }
        }


    }



    public function ctrDescargarReportesExcelClientes() {
        if (isset($_GET["clientesExcel"])) {
            
            $tabla = "clientes";
            $item = null;
            $valor = null;
    
            // Obtener los clientes desde el modelo
            $clientes = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);
        }
    
        // Nombre del archivo Excel a generar
        $name = $_GET["clientesExcel"] . '.xls';
    
        // Configuración de los encabezados HTTP para descarga de archivo Excel
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
        // Iniciar la tabla y definir los encabezados de las columnas
        echo utf8_decode("<table border='1'>
            <tr>
                <td style='text-align:center; font-weight:bold;'>Nombre</td>
                <td style='text-align:center; font-weight:bold;'>Correo Electrónico</td>
                <td style='text-align:center; font-weight:bold;'>Teléfono</td>
                <td style='text-align:center; font-weight:bold;'>Direccion</td>
                <td style='text-align:center; font-weight:bold;'>Fecha</td>
            </tr>");
    
        // Recorrer los usuarios y generar las filas de la tabla
        foreach ($clientes as $key => $datos) {
            echo utf8_decode("<tr>
                <td style='text-align:center;'>" . $datos["nombre"] . "</td>
                <td style='text-align:center;'>" . $datos["correo"] . "</td>
                <td style='text-align:center;'>" . $datos["telefono"] . "</td>
                <td style='text-align:center;'>" . $datos["direccion"] . "</td>
                <td style='text-align:center;'>" . $datos["fecha"] . "</td>
            </tr>");
        }
    
        // Cerrar la tabla
        echo "</table>";
        exit(); // Para evitar que el script continúe ejecutándose después de la exportación
    }





    public function ctrDescargarReportesWordClientes() {
        if (isset($_GET["clientesWord"])) {
            
            $tabla = "clientes";
            $item = null;
            $valor = null;
    
            // Obtener los clientes desde el modelo
            $clientes = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);
        }
    
        // Nombre del archivo Word a generar
        $name = $_GET["clientesWord"] . '.doc';
    
        // Configuración de los encabezados HTTP para descarga de archivo Word
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: application/vnd.ms-doc');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
        // Iniciar la tabla y definir los encabezados de las columnas
        echo utf8_decode("<table border='1'>
            <tr>
                <td style='text-align:center; font-weight:bold;'>Nombre</td>
                <td style='text-align:center; font-weight:bold;'>Correo Electrónico</td>
                <td style='text-align:center; font-weight:bold;'>Teléfono</td>
                <td style='text-align:center; font-weight:bold;'>Dirección</td>
                <td style='text-align:center; font-weight:bold;'>Fecha</td>
            </tr>");
    
        // Recorrer los clientes y generar las filas de la tabla
        foreach ($clientes as $key => $datos) {
            echo utf8_decode("<tr>
                <td style='text-align:center;'>" . $datos["nombre"] . "</td>
                <td style='text-align:center;'>" . $datos["correo"] . "</td>
                <td style='text-align:center;'>" . $datos["telefono"] . "</td>
                <td style='text-align:center;'>" . $datos["direccion"] . "</td>
                <td style='text-align:center;'>" . $datos["fecha"] . "</td>
            </tr>");
        }
    
        // Cerrar la tabla
        echo "</table>";
        exit(); // Para evitar que el script continúe ejecutándose después de la exportación
    }




    public function ctrDescargarReportesCSVClientes() {
        if (isset($_GET["clientesCSV"])) {
            $tabla = "clientes";
            $item = null;
            $valor = null;
    
            // Obtener los usuarios desde el modelo
            $clientes = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);
        }
    
        // Nombre del archivo CSV
        $name = $_GET["clientesCSV"] . '.csv';
    
        // Configuración de los encabezados HTTP
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
        // Crear contenido del CSV
        $datos = "";
        $datos .= "NOMBRE,CORREO ELECTRÓNICO,TELÉFONO,DIRECCIÓN,FECHA\r\n";
    
        foreach ($clientes as $key => $values) {
            $datos .= "$values[nombre],$values[correo],$values[telefono],$values[direccion],$values[fecha]\r\n";
        }
    
        echo utf8_decode($datos);
        exit();
    }
    
    
    



    
}
