<?php 

require_once "../controlador/empresa.controlador.php";
require_once "../modelos/empresa.modelo.php";

class AjaxLogo{

        public $imagenLogo;
   

    public function ajaxCambiarLogo(){

        $item = "logo";
        $valor = $this->imagenLogo;

        $respuesta = ControladorEmpresa::ctrActualizarLogo($item,$valor);

        echo ($respuesta);



    }

}

// Cambiar Logo
if (isset($_FILES['imagenLogo'])) {
    
    $editar = new AjaxLogo();
    $editar->imagenLogo = $_POST['imagenLogo'];
    $editar->ajaxCambiarLogo();

}