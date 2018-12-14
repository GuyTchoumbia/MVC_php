<?php
/*
 * un singlton
 */
class singleton {
    public $connection;
    private static $dsn = 'mysql:host=localhost; dbname=formation; charset=utf8';
    private static $login = 'root';
    private static $password = '';    
    protected static $instance;
    
    private function __construct(){   
       $this->connection = new PDO(self::$dsn,self::$login,self::$password);
    }
    
    public static function getInstance(){
        if (self::$instance==null){
            self::$instance = new singleton();    
        }
        return self::$instance;
    }
    
    public function getConnection(){
        return $this->connection;
    }    
}


 

