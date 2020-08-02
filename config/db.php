<?php

class Database{
    public static function conection(){
        $conexion = new mysqli("localhost", "root", "", "tasklist");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}