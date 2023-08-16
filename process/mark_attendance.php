<?php

require_once("../class/Attendance.php");
$att = new Attendance();

// If this page wasnt visited throught a post method, this statment below returns the (person) back to the page
if($_POST){


    // On.click of the "send" button, the following data is sent to the database via this if($_POST) statement
    if(isset($_POST["attend_button"])){

        if(isset($_POST["staffs"])){
            $staffs = $_POST["staffs"]; 
        }

        $staffs = $_POST["staffs"];

        $attend_date = $_POST["attend_date"];

        $attend_status = $_POST["attend_status"];

        // THIS STATMENT BELOW EXPLAINS THE FACT THAT IF A DATE IS NOT SELECTED, IT ALERTS THE HR TO SELECT A DATE
        if(!isset($_POST["staffs"])){
            $_SESSION["staffs_error"] = "Kindly select a date";
            header("location:../newindex.php");
             exit();
        }


        $attend = $att->setAttendance($attend_status, $staffs, $attend_date);

        if($attend){
            echo "success adding";
        }

    }


}else{
    header("location:../newindex.php");
}
?>