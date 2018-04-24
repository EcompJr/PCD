<?php
class Connection {
    private static  $instance;

    private function __construct(){
        //
    }
    public static function getInstance(){
        if(!isset(self::$instance)){
            try{
                self::$instance = new PDO("mysql:host=localhost;dbname=db_pcd", "root", "root", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            } catch (PDOException $e){
                var_dump($e);
            }
        }
        return self::$instance;
    }
}
?>