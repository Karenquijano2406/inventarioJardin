<?php

class ControladorEmpresa {

static public function ctrMostrarEmpresa($item, $valor) {
    $tabla = "empresa";
    $respuesta = ModeloEmpresa::mdlMostrarEmpresa($tabla, $item, $valor);
    return $respuesta;
}

static public function ctrEditarEmpresa() {
    if (isset($_POST["editarEmpresa"])) {
        $tabla = "empresa";

        // Recibimos los datos enviados del formulario
        $datos = array(
            "id" => $_POST['idEmpresa'],
            "nombre" => $_POST['editarEmpresa'],
            "telefono" => $_POST['editarTelefono'],
            "sitioweb" => $_POST['editarSitioWeb'],
            "direccion" => $_POST['editarDireccion']
        );

        // Llamamos al modelo para editar la empresa
        $respuesta = ModeloEmpresa::mdlEditarEmpresa($tabla, $datos);

        if ($respuesta == "ok") {
            echo '<script>
                swal({
                    type: "success",
                    title: "La empresa ha sido editada correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "empresa";
                    }
                });
            </script>';
        } else {
            echo '<script>
                swal({
                    type: "error",
                    title: "La empresa no ha sido editada correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "empresa";
                    }
                });
            </script>';
        }
    }
}
}
