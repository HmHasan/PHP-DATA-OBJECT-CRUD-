<?php 

define('dbname', 'test_db');
define('db_host', 'localhost');
define('db_user', 'root');
define('db_pass', '');
class db
{
    public static $link;
    
    public static function connetion()
    {
        if(!(isset(self::$link)))
        {
            self::$link = new PDO("mysql:host=".db_host.";dbname=".dbname,db_user,db_pass);
            self::$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = self::$link;
            
        }

        return $result;
    }
public static function prepare($sql)
{
    return self::connetion()->prepare($sql);
    
}
}


?>