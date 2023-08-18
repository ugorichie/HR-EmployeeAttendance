<?php

class Db{
        
    private $dbHost = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName = "yipattendancetask";



    //THIS FUNCTION CONNECTS THIS CLASS(PHP) TO THE DATABASE
    public function connect(){
        try{

            $dsn = "mysql:host={$this->dbHost};dbname={$this->dbName}";
            $conn = new PDO($dsn,$this->dbUsername,$this->dbPassword);
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        }catch(PDOEXECEPTION $e){

            echo $e -> getMessage();

        }

    }


}

    //INSTANTIALIZATION HAPPENS HERE TO TELL US IF WE ARE HAVE SUUCCESSFULLY CONNECTED TO THE DATABASE.
         $demo = new Db();
    //    print_r($demo -> connect());
   



?>