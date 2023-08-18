<?php
require_once("Db.php");

Class Staff extends Db{



    //THIS FUNCTION IS RESPONSIBLE FOR FATCHING DETAILS OF ALL THRE STAFF IN TEH DATABASE TO BE DISPALYED WHERE NECESARY
    public function getStaff(){
        $sql = "SELECT * FROM Staff ";
        $stmt = $this -> connect() -> prepare($sql);
        $stmt -> execute([]);
        $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
        return $result;

    }

    public function showStaff($staff_id){
        $sql = "SELECT * from staff where staff_id = ?";
        $stmt = $this -> connect() -> prepare($sql);
        $stmt -> execute([$staff_id]);
        $showResult = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $showResult;
    }



}

$check = new Staff();
$checker = $check -> getStaff();

// print_r ($checker);


?>
