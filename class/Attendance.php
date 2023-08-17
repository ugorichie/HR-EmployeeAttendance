<?php
// We need to require our class (methods), this is a common  practice that allows us access our database
// you can either use ( require // require_once // include // include_once )
require_once("Db.php");
class Attendance extends Db{





    //This method is responsible for adding employer attendance to the database.
    public function setAttendance($attendance_status, $staff_id, $attendance_date){

             $sql = "SELECT * FROM attendance WHERE attendance_date = ? AND staff_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$attendance_date, $staff_id]);

             // Do a rowcount()on the database, if rowcount on the date selected is 1, means the date has already been selected before

            $attendancecount = $stmt->rowCount();

            if ($attendancecount > 1) {
                echo "Sorry, you cannot select a date more than once. Kindly go back and select the right date.";
                exit();
            }

            
        // The Method for setAttendance starts here.
        $sql = "INSERT INTO attendance(attendance_status, staff_id, attendance_date) VALUES (?,?,?)";
        $stmt = $this -> connect() -> prepare($sql);
        $result = $stmt-> execute([$attendance_status, $staff_id, $attendance_date]);
        return $result;
    }





    //This method is responsible for showing the attendance details (whether present or abesent) of the employee
    public function getAttendance($staff_id){
            $sql = "SELECT * FROM attendance WHERE staff_id = ?";
            $stmt = $this->connect()-> prepare($sql);
            $stmt->execute([$staff_id]);
            $show = $stmt -> fetch(PDO::FETCH_ASSOC);
            return $show;
        }
    

         
    }


//INITATIATE AN OBJECT

// $att = new Attendance();
// $attend = $att->setAttendance