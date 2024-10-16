<?php
/*
private static PDO con = null;

public static function getConection():PDO {
    if (con == null){
        con = new PDO("cadena de conexión");
    }
    
    return con;
}

El objeto PDO es una clase capaz de conectarse con la base de datos
La "Cadena de conexión" es todo el formato de la cadena de conexión para conectarme a la BD
*/
class Conexion{
    private static $con;

    public static function getConection():PDO{
        if (self::$con == null){
            // Conseguir cadena de conexión
            self::$con = new PDO("mysql:host=localhost;dbname=tiendaCoches",'root','root');
        }
        return self::$con;
    }
}