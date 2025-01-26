<?php 

class ControladorEmpresa {

    static public function ctrMostrarEmpresa($item, $valor) {
        $tabla = "empresa";
        $respuesta = ModeloEmpresa::mdlMostrarEmpresa($tabla, $item, $valor);
        return $respuesta;
    }


    
    




   


    
    
}
