<?php
require_once "conexion.php";

class ModeloProductos {

    static public function mdlIngresarProductos($tabla, $datos) {
        $stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla (categoria,nombre, descripcion, precioCompra, precioVenta, stock) 
            VALUES (:categoria, :nombre, :descripcion, :precioCompra, :precioVenta, :stock)");

        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":precioCompra", $datos["precioCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":precioVenta", $datos["precioVenta"], PDO::PARAM_STR); 
        $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }



    static public function mdlIngresarProductosEntrada($tabla, $datos) {
        $stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla (nombreEmpresa, tipoEmpresa, nombreProducto, entradap) 
            VALUES (:nombreEmpresa, :tipoEmpresa, :nombreProducto, :entradap)");

        $stmt->bindParam(":nombreEmpresa", $datos["nombreEmpresa"], PDO::PARAM_STR);
        $stmt->bindParam(":tipoEmpresa", $datos["tipoEmpresa"], PDO::PARAM_STR);
        $stmt->bindParam(":nombreProducto", $datos["nombreProducto"], PDO::PARAM_STR);
        $stmt->bindParam(":entradap", $datos["entradap"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }



    static public function mdlIngresarProductosSalidas($tabla, $datos) {
        $stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla (categoriap, nombrep, nombreCliente, salidap) 
            VALUES (:categoriap, :nombrep, :nombreCliente, :salidap)");

        $stmt->bindParam(":categoriap", $datos["categoriap"], PDO::PARAM_STR);
        $stmt->bindParam(":nombrep", $datos["nombrep"], PDO::PARAM_STR);
        $stmt->bindParam(":nombreCliente", $datos["nombreCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":salidap", $datos["salidap"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }



    static public function mdlEditarProductos($tabla, $datos) {
        $stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET categoria = :categoria, nombre = :nombre, descripcion = :descripcion, precioCompra = :precioCompra, precioVenta = :precioVenta, stock = :stock WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":precioCompra", $datos["precioCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":precioVenta", $datos["precioVenta"], PDO::PARAM_STR); 
        $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }


    static public function mdlMostrarProductos($tabla, $item, $valor) {
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



    static public function mdlMostrarProductosEntradas($tabla, $item, $valor) {
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


    static public function mdlMostrarProductosSalidas($tabla, $item, $valor) {
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


    static public function mdlBorrarProductos($tabla,$datos){

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



    static public function mdlActualizarProductosEntrada($tablaDos,$itemDos,$valor,$resultado) {
        $stmt = Conexion::Conectar()->prepare("UPDATE $tablaDos SET $itemDos = :$itemDos WHERE id = :id");

        $stmt->bindParam(":".$itemDos, $resultado, PDO::PARAM_STR);
        
        $stmt->bindParam(":id",$valor, PDO::PARAM_INT);
       

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }



    static public function mdlActualizarProductosSalidas($tablaDos,$itemDos,$valor,$resultado) {
        $stmt = Conexion::Conectar()->prepare("UPDATE $tablaDos SET $itemDos = :$itemDos WHERE id = :id");

        $stmt->bindParam(":".$itemDos, $resultado, PDO::PARAM_STR);
        
        $stmt->bindParam(":id",$valor, PDO::PARAM_INT);
       

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }


}
