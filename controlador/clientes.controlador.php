<?php 

class ControladorClientes {

    static public function ctrMostrarClientes($item, $valor) {
        $tabla = "clientes";
        $respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);
        return $respuesta;
    }


    static public function ctrCrearClientes() {
        if (isset($_POST["nuevoNombre"])) {
            $tabla = "clientes";

           

            $datos = array(
                "nombre" => $_POST['nuevoNombre'],
                "correo" => $_POST['nuevoCorreo'],
                "telefono" => $_POST['nuevoTelefono'],
                "direccion" => $_POST['nuevoDireccion']
            );

            $respuesta = ModeloClientes::mdlIngresarClientes($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "El cliente ha sido guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "clientes";
                        }
                    });
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "El cliente no ha sido guardado correctamente",
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



    static public function ctrBorrarUsuarios(){

        if (isset($_GET['idUsuario'])) {
            
            $tabla = "usuarios";
            $datos = $_GET['idUsuario'];

            $respuesta = ModeloUsuarios::mdlBorrarUsuarios($tabla,$datos);

            if ($respuesta == "ok") {
                
                echo '<script>
                    swal({
                        type: "success",
                        title: "El usuario ha sido eliminado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "usuarios";
                        }
                    });
                </script>';

            }
        }


    }



    public function ctrDescargarReportesExcelUsuarios() {
        if (isset($_GET["usuariosExcel"])) {
            
            $tabla = "usuarios";
            $item = null;
            $valor = null;
    
            // Obtener los usuarios desde el modelo
            $usuarios = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
        }
    
        // Nombre del archivo Excel a generar
        $name = $_GET["usuariosExcel"] . '.xls';
    
        // Configuración de los encabezados HTTP para descarga de archivo Excel
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
        // Iniciar la tabla y definir los encabezados de las columnas
        echo utf8_decode("<table border='1'>
            <tr>
                <td style='text-align:center; font-weight:bold;'>Nombre</td>
                <td style='text-align:center; font-weight:bold;'>Usuario</td>
                <td style='text-align:center; font-weight:bold;'>Perfil</td>
                <td style='text-align:center; font-weight:bold;'>Fecha</td>
            </tr>");
    
        // Recorrer los usuarios y generar las filas de la tabla
        foreach ($usuarios as $key => $datos) {
            echo utf8_decode("<tr>
                <td style='text-align:center;'>" . $datos["nombre"] . "</td>
                <td style='text-align:center;'>" . $datos["usuario"] . "</td>
                <td style='text-align:center;'>" . $datos["perfil"] . "</td>
                <td style='text-align:center;'>" . $datos["fecha"] . "</td>
            </tr>");
        }
    
        // Cerrar la tabla
        echo "</table>";
        exit(); // Para evitar que el script continúe ejecutándose después de la exportación
    }





    public function ctrDescargarReportesWordUsuarios() {
        if (isset($_GET["usuariosWord"])) {
            
            $tabla = "usuarios";
            $item = null;
            $valor = null;
    
            // Obtener los usuarios desde el modelo
            $usuarios = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
        }
    
        // Nombre del archivo Word a generar
        $name = $_GET["usuariosWord"] . '.doc';
    
        // Configuración de los encabezados HTTP para descarga de archivo Word
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: application/vnd.ms-doc');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
        // Iniciar la tabla y definir los encabezados de las columnas
        echo utf8_decode("<table border='1'>
            <tr>
                <td style='text-align:center; font-weight:bold;'>Nombre</td>
                <td style='text-align:center; font-weight:bold;'>Usuario</td>
                <td style='text-align:center; font-weight:bold;'>Perfil</td>
                <td style='text-align:center; font-weight:bold;'>Fecha</td>
            </tr>");
    
        // Recorrer los usuarios y generar las filas de la tabla
        foreach ($usuarios as $key => $datos) {
            echo utf8_decode("<tr>
                <td style='text-align:center;'>" . $datos["nombre"] . "</td>
                <td style='text-align:center;'>" . $datos["usuario"] . "</td>
                <td style='text-align:center;'>" . $datos["perfil"] . "</td>
                <td style='text-align:center;'>" . $datos["fecha"] . "</td>
            </tr>");
        }
    
        // Cerrar la tabla
        echo "</table>";
        exit(); // Para evitar que el script continúe ejecutándose después de la exportación
    }




    public function ctrDescargarReportesCSVUsuarios() {
        if (isset($_GET["usuariosCSV"])) {
            $tabla = "usuarios";
            $item = null;
            $valor = null;
    
            // Obtener los usuarios desde el modelo
            $usuarios = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
        }
    
        // Nombre del archivo CSV
        $name = $_GET["usuariosCSV"] . '.csv';
    
        // Configuración de los encabezados HTTP
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
        // Crear contenido del CSV
        $datos = "";
        $datos .= "NOMBRE,USUARIO,PERFIL,FECHA\r\n";
    
        foreach ($usuarios as $key => $values) {
            $datos .= "$values[nombre],$values[usuario],$values[perfil],$values[fecha]\r\n";
        }
    
        echo utf8_decode($datos);
        exit();
    }
    
    
    



    
}
