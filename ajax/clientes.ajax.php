<?php 

require_once "../controlador/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

    public $idCliente;

    public function ajaxEditarClientes(){

        $item = "id";
        $valor = $this->idCliente;

        $respuesta = ControladorClientes::ctrMostrarClientes($item,$valor);

        echo json_encode($respuesta);



    }

}

// Editar Usuarios
if (isset($_POST['idCliente'])) {
    
    $editar = new AjaxClientes();
    $editar->idCliente = $_POST['idCliente'];
    $editar->ajaxEditarClientes();

}