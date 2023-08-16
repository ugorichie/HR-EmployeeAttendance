<?php

class Attendance extends Db{



    public function setAttendance($attendance_status, $staff_id, $attendance_date){
        $sql = "INSERT INTO attendance(attendance_status, staff_id, attendance_date) VALUES (?,?,?)";
        $stmt = $this -> connect() -> prepare($sql);
        $result = $stmt-> execute([$attendance_status, $staff_id, $attendance_date]);
        return $result;
    }

    public function getAttendance(){}

}

//INITATIATE AN OBJECT

// $att = new Attendance();
// $attend = $att->setAttendance