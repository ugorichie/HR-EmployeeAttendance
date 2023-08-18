<?php
// We need to require our class (methods), this is a common  practice that allows us access our database
// you can either use ( require // require_once // include // include_once )
require_once("Db.php");
class Attendance extends Db{


        private $conn;

        public function __construct(){
            $this->conn = $this->connect();
        }


    //This method is responsible for adding employer attendance to the database.
    public function setAttendance($attendance_status, $staff_id, $attendance_date){

             $sql = "SELECT * FROM attendance WHERE attendance_date = ? AND staff_id = ?";
            $stmt = $this->conn ->prepare($sql);
            $stmt->execute([$attendance_date, $staff_id]);

             // Do a rowcount()on the database, if rowcount on the date selected is 1, means the date has already been selected before

            $attendancecount = $stmt->rowCount();

            if ($attendancecount === 1 ) {
                echo "SORRY, you cannot select a particular date for a staff more than once, as you have marked attendance for this staff.  Kindly go back and select the right date.";
                exit();
            }


        // The Method for setAttendance starts here.
        $sql = "INSERT INTO attendance(attendance_status, staff_id, attendance_date) VALUES (?,?,?)";
        $stmt = $this -> conn -> prepare($sql);
        $result = $stmt-> execute([$attendance_status, $staff_id, $attendance_date]);
        return $result;
    }





    //This method is responsible for showing the attendance details (whether present or abesent) of the staff
    public function getAttendance($staff_id){
            $sql = "SELECT * FROM attendance join staff on staff.staff_id = attendance.staff_id  WHERE attendance.staff_id = ?";
            $stmt = $this->conn-> prepare($sql);
            $stmt->execute([$staff_id]);
            $show = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $show;
        }
    


    //This method is in responsible for showing / displaying the number of times the Staff was Absent
    public function countAbsent($staff_id){
        $sql = "SELECT * FROM attendance where attendance_status = 'absent' and staff_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$staff_id]);
        $count = $stmt -> rowCount();
         return $count;
    }

    //This method is in responsible for showing / displaying the number of times the Staff was Absent
    public function countPresent($staff_id){
        $sql = "SELECT * FROM attendance where attendance_status = 'present' and staff_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$staff_id]);
        $count = $stmt -> rowCount();
         return $count;
    }


         
    }


//INITATIATE AN OBJECT

// $att = new Attendance();
// $attend = $att->setAttendance