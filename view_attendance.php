<?php
require_once("class/Attendance.php");
require_once("class/Staff.php");

//QUERY STRING - THIS IS TO GET THE staff_id from the URL using the GET METHOD
if(isset($_GET["staff_id"])){
    $staff_id = $_GET["staff_id"];
 
$att = new Attendance(); //instantation of class Attendance (creating new object)

$attend = $att->getAttendance($staff_id); 
$countAbsent = $att->countAbsent($staff_id); 
$countPresent = $att->countPresent($staff_id);
    
 $showResult = new Staff();
 $staffDetails = $showResult -> showStaff($staff_id);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <title>View Attendance</title>
</head>
<body>

        <section>
            <div class="row">

                    <h2 class="text-center">
                        Staff Fullname: <?php  echo $staffDetails["staff_fullname"] ;?>
                    </h2>

                    <h4 class="text-center text-info my-2">
                        EMPLOYEE EMAIL -: <?php echo $staffDetails["staff_email"] ;?>
                    </h4>

                    <h5 class="text-muted text-center">
                        Current Monthly Salary: <?php echo $staffDetails["staff_salary"]   ;?>
                    </h5>

                        <div class="col-6 text-center my-2">
                        <span class=" text-danger">Number of Absent days - <?php echo $countAbsent?></span>
                        </div>
                        <div class="col-6">  
                        <span class=" text-success ">Number of Present days - <?php echo $countPresent?></span> 
                        </div>
                           
            </div>



        </section>

        <section>
            <table class="table table-hover table-striped table-center">
                <tr>
                    <th>S/N</th>
                    <th>Attendance Date</th>
                    <th>Attendance Status</th>
                    
                </tr>
                <!-- this table is populated with staff information from the database -->
                <?php
                    $counter = 1;
                    foreach($attend as $key => $staff){
                ?>
                
                    <tr>
                        <td><?php echo $counter++ ?></td>
                        <td><?php echo $staff["attendance_date"] ?></td>
                        <td><?php echo $staff["attendance_status"] ?></td>
                        
                    </tr>
                <?php
                    }
                ?>
            
            </table>
        </section>

    <script src="bootstrap/js/bootstrap.bundle.js"> </script>
</body>
</html>