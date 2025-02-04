<?php
require_once "conexion.php";

class ModeloProveedores {

    static public function mdlIngresarProveedores($tabla, $datos) {
        $stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla (empresa, tipoEmpresa, correo, telefono, direccion) 
            VALUES (:empresa, :tipoEmpresa, :correo, :telefono, :direccion)");

        $stmt->bindParam(":empresa", $datos["empresa"], PDO::PARAM_STR);
        $stmt->bindParam(":tipoEmpresa", $datos["tipoEmpresa"], PDO::PARAM_STR);
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


    static public function mdlEditarProveedores($tabla, $datos) {
        $stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET empresa = :empresa, tipoEmpresa = :tipoEmpresa, correo = :correo, telefono = :telefono, direccion = :direccion WHERE id = :id");

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);
        $stmt->bindParam(":empresa", $datos["empresa"], PDO::PARAM_STR);
        $stmt->bindParam(":tipoEmpresa", $datos["tipoEmpresa"], PDO::PARAM_STR);
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


    static public function mdlMostrarProveedores($tabla, $item, $valor) {
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


    static public function mdlBorrarProveedores($tabla,$datos){

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
