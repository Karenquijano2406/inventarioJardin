<?php 

class ControladorCategorias {

    static public function ctrMostrarCategorias($item, $valor) {
        $tabla = "categorias";
        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
        return $respuesta;
    }

  

    static public function ctrCrearCategorias() {
        if (isset($_POST["nombreCategoria"])) {
            $tabla = "categorias";


            $datos = array(
                "nombre" => $_POST['nombreCategoria']
            );

            $respuesta = ModeloCategorias::mdlIngresarCategorias($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "La categoria ha sido guardada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "categorias";
                        }
                    });
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "La categoria no ha sido guardada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "categorias";
                        }
                    });
                </script>';
            }
        }



        
    }

    static public function ctrEditarCategorias() {
        if (isset($_POST["editarNombreC"])) {
            $tabla = "categorias";


            $datos = array("id" => $_POST['id'],
                "nombre" => $_POST['editarNombreC'],
               
            );

            $respuesta = ModeloCategorias::mdlEditarCategorias($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "La categoria ha sido editada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "categorias";
                        }
                    });
                </script>';

            }else {

                echo '<script>
                    swal({
                        type: "error",
                        title: "La categoria no ha sido editada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "categorias";
                        }
                    });
                </script>';
                
            }

        }


    }



    static public function ctrBorrarCategorias(){

        if (isset($_GET['idCategoria'])) {
            
            $tabla = "categorias";
            $datos = $_GET['idCategoria'];

            $respuesta = ModeloCategorias::mdlBorrarCategorias($tabla,$datos);

            if ($respuesta == "ok") {
                
                echo '<script>
                    swal({
                        type: "success",
                        title: "La categoria ha sido eliminada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "categorias";
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
