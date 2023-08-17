<?php
session_start();
require_once("../class/Attendance.php");
$attendance_instance = new Attendance();

require_once("../class/Salary.php");
$salary_instance = new Salary();

// If this page wasnt visited throught a post method, this statment below returns the (person) back to the page
if($_POST){


    // On.click of the "send" button, the following data is sent to the database via this if($_POST) statement
    if(isset($_POST["attend_button"])){

        if(isset($_POST["staffs"])){
            $staffs = $_POST["staffs"]; 
        }

        $staffs = $_POST["staffs"];

        $attend_date = $_POST["attend_date"];

        if(isset($_POST["attend_status"])){
            $attend_status = $_POST["attend_status"];
       }


        // THIS STATMENT BELOW EXPLAINS THE FACT THAT IF A ATTENDANCE STATUS IS NOT SELECTED, IT ALERTS THE HR TO SELECT A STATUS
        if(!isset($_POST["attend_status"])){
             echo "kindly select a status";
        }


        $attend = $attendance_instance -> setAttendance($attend_status, $staffs, $attend_date);

        if($attend){
            // echo "success adding";
            $_SESSION["staffs_success"] = "You have successfully marked an attendance. for date: ".$attend_date." - - : click 'view attendance' to see salary updates " ;
            header("location:../newindex.php");
             exit();

            if($attend_status === "absent"){
                $salary = $salary_instance -> applyDeduction ($attend_date, $staffs, $staff_Salary) ;
             }
            
        }

        

    }


}else{
    header("location:../newindex.php");
}
?>