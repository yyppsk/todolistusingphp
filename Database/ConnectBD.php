<?php

class ConnectBD
{
    private static $connection;

    public static function createConnection()
    {
        if (self::$connection == null){
            try {
                self::$connection = new PDO("mysql:host=localhost;dbname=todolist","root","");
            }catch (PDOException $e){
                echo $e->getMessage();
            }
        }

        return self::$connection;
    }
}