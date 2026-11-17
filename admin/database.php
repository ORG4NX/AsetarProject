<?php

class Database
{
    private static $dbHost = "localhost";
    private static $dbName = "ASETAR08";
    private static $dbUsername = "root";
    private static $dbUserpassword = "";
    
    private static $connection = null;
    
    public static function connect()
    {
        if(self::$connection == null)
        {
            try
            {
              // Variables DB_* en Docker, sinon valeurs d'origine
              $host = getenv('DB_HOST') ?: self::$dbHost;
              $name = getenv('DB_NAME') ?: self::$dbName;
              $user = getenv('DB_USER') ?: self::$dbUsername;
              $pass = getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : self::$dbUserpassword;
              self::$connection = new PDO("mysql:host=" . $host . ";dbname=" . $name . ";charset=utf8", $user, $pass);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }
    
    public static function disconnect()
    {
        self::$connection = null;
    }

}
?>
