<?php 

class ControladorEmpresa {

    static public function ctrMostrarEmpresa($item, $valor) {
        $tabla = "empresa";
        $respuesta = ModeloEmpresa::mdlMostrarEmpresa($tabla, $item, $valor);
        return $respuesta;
    }


    
    static public function ctrMostrarLogo($item, $valor) {
        $tabla = "logo";
        $respuesta = ModeloEmpresa::mdlMostrarlogo($tabla, $item, $valor);
        return $respuesta;
    }


    static public function ctrMostrarIcono($item, $valor) {
        $tabla = "icono";
        $respuesta = ModeloEmpresa::mdlMostrarIcono($tabla, $item, $valor);
        return $respuesta;
    }


    static public function ctrActualizarLogo($item, $valor) {
        $tabla = "empresa";
        $respuesta = ModeloEmpresa::mdlActualizarLogo($tabla, $item, $valor);
        return $respuesta;
    }



    
    
}
