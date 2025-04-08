<?php 

require_once "../controlador/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos{

    public $idProducto;

    public function ajaxEditarProductos(){

        $item = "id";
        $valor = $this->idProducto;

        $respuesta = ControladorProductos::ctrMostrarProductos($item,$valor);

        echo json_encode($respuesta);



    }

}

// Editar productos
if (isset($_POST['idProducto'])) {
    
    $editar = new AjaxProductos();
    $editar->idProducto = $_POST['idProducto'];
    $editar->ajaxEditarProductos();

}



//para la CADUCIDAD
if (isset($_POST["idProducto"]) && isset($_POST["fechaCaducidad"])) {
  
    $tabla = "productos";
    $id = $_POST["idProducto"];
    $fecha = $_POST["fechaCaducidad"];
  
    $respuesta = ModeloProductos::mdlActualizarCaducidad($tabla, $id, $fecha);
  
    echo $respuesta;
  }
  