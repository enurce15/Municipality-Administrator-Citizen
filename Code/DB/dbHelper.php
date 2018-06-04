<?php


class dbHelper{

//    public $serverName = 'localhost';
//    public $userName = 'enurce15';
//    public $password = 'erida123';
//    public $dbName = "cen17_enurce15";
    public $serverName = '127.0.0.1';
    public $userName = 'root';
    public $password = '';
    public $dbName = "abq";
    public $connection ;

    function __construct()
    {
        if(!isset($this->connection)){
            $this->connection = new \mysqli($this->serverName,$this->userName,$this->password,$this->dbName);
            if(!$this->connection){
                echo "Error! Couldn't connect to database";
                exit;
            }
        }

        return $this->connection;
    }

    function disconnect(){
        \mysqli_close($this->connection);
        echo "Disconnected";
    }
}