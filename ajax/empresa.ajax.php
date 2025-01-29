<?php 
require_once "../controlador/empresa.controlador.php";
require_once "../modelos/empresa.modelo.php";

class AjaxEmpresa {
    public $idEmpresa;

    public function ajaxEditarEmpresa() {
        $item = "id";
        $valor = $this->idEmpresa;
        $respuesta = ControladorEmpresa::ctrMostrarEmpresa($item, $valor);
        echo json_encode($respuesta);
    }
}

if (isset($_POST["idEmpresa"])) {
    $empresa = new AjaxEmpresa();
    $empresa->idEmpresa = $_POST["idEmpresa"];
    $empresa->ajaxEditarEmpresa();
}
?>
