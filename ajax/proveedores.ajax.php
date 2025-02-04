<?php 

require_once "../controlador/proveedores.controlador.php";
require_once "../modelos/proveedores.modelo.php";

class AjaxProveedores{

    public $idProveedores;

    public function ajaxEditarProveedores(){

        $item = "id";
        $valor = $this->idProveedores;

        $respuesta = ControladorProveedores::ctrMostrarProveedores($item,$valor);

        echo json_encode($respuesta);



    }

}

// Editar proveedores
if (isset($_POST['idProveedores'])) {
    
    $editar = new AjaxProveedores();
    $editar->idProveedores = $_POST['idProveedores'];
    $editar->ajaxEditarProveedores();

}