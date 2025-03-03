<?php
require_once "conexion.php";

class ModeloNotificaciones {

    static public function mdlIngresarProductosNotificaciones($tablaDos, $datosDos) {
        $stmt = Conexion::Conectar()->prepare("INSERT INTO $tablaDos (idproducto, stock) 
            VALUES (:idproducto, :stock)");

        $stmt->bindParam(":idproducto", $datosDos["idproducto"], PDO::PARAM_INT);
        $stmt->bindParam(":stock", $datosDos["stock"], PDO::PARAM_INT);
        

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }


    static public function mdlEditarClientes($tabla, $datos) {
        $stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET nombre = :nombre, correo = :correo, telefono = :telefono, direccion = :direccion WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR); 
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }


    static public function mdlMostrarClientes($tabla, $item, $valor) {
        if ($item != null) {
            $stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }


    static public function mdlBorrarClientes($tabla,$datos){

        $stmt = Conexion::Conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {
            
            return "ok";

        }else {

            return "error";
        }

        
        $stmt->close();
        $stmt = null;


    }



}
