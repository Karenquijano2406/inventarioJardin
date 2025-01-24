<?php 

class ControladorUsuarios {

    static public function ctrMostrarUsuarios($item, $valor) {
        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrIngresoUsuario() {
        if (isset($_POST['IngUsuario'])) {
            $tabla = "usuarios";
            $item = "usuario";
            $valor = $_POST['IngUsuario'];

            // Obtener el usuario desde la base de datos
            $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

            // Verificar usuario y contraseña
            if ($respuesta && password_verify($_POST['IngPassword'], $respuesta["password"])) {
                // Iniciar sesión
                $_SESSION['iniciarSesion'] = "ok";
                $_SESSION["id"] = $respuesta["id"];
                $_SESSION["nombre"] = $respuesta["nombre"];
                $_SESSION["usuario"] = $respuesta["usuario"];
                $_SESSION["perfil"] = $respuesta["perfil"];

                echo '<script>window.location = "inicio";</script>';
            } else {
                echo '<br><div class="alert alert-danger">Error: Usuario o contraseña incorrectos</div>';
            }
        }
    }

    static public function ctrCrearUsuarios() {
        if (isset($_POST["nuevoUsuario"])) {
            $tabla = "usuarios";

            // Encriptar la contraseña
            $passwordEncriptado = password_hash($_POST["nuevoPassword"], PASSWORD_DEFAULT);

            $datos = array(
                "nombre" => $_POST['nuevoNombre'],
                "usuario" => $_POST['nuevoUsuario'],
                "password" => $passwordEncriptado,
                "perfil" => $_POST['nuevoPerfil']
            );

            $respuesta = ModeloUsuarios::mdlIngresarUsuarios($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "El usuario ha sido guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "usuarios";
                        }
                    });
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "El usuario no ha sido guardado correctamente",
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

    static public function ctrEditarUsuarios() {
        if (isset($_POST["editarUsuario"])) {
            $tabla = "usuarios";

            // Encriptar la contraseña
            $passwordEncriptado = password_hash($_POST["editarPassword"], PASSWORD_DEFAULT);

            $datos = array("id" => $_POST['id'],
                "nombre" => $_POST['editarNombre'],
                "usuario" => $_POST['editarUsuario'],
                "password" => $passwordEncriptado,
                "perfil" => $_POST['editarPerfil']
            );

            $respuesta = ModeloUsuarios::mdlEditarUsuarios($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "El usuario ha sido editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "usuarios";
                        }
                    });
                </script>';

            }else {

                echo '<script>
                    swal({
                        type: "error",
                        title: "El usuario no ha sido editado correctamente",
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
