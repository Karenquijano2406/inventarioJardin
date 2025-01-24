<?php  

class Conexion{

    static public function Conectar(){

        $link = new PDO('mysql:host=localhost;dbname=inventariojardin', 'root', '');

        $link->exec("set names utf8");

        return $link;
    }
}