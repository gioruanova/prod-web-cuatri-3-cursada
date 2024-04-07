<?php

class Cnx
{
    private static ?PDO $db = null;


    private function __construct()
    {
        //
    }

    public static function getInstance():?PDO
    {
        if (is_null(self::$db)) {
            self::$db = new PDO('mysql:host=localhost;dbname=lavadero;charset=utf8;port=3306', 'root', '');
            echo 'Conexion exitosa';
        }
        return self::$db;
    }

}