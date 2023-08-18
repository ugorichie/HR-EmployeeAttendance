<?php
require_once("class/Attendance.php");
require_once("class/Staff.php");

//QUERY STRING - THIS IS TO GET THE staff_id from the URL using the GET METHOD
if(isset($_GET["staff_id"])){
    $staff_id = $_GET["staff_id"];
 
$att = new Attendance();
 $attend = $att->getAttendance($staff_id);
    
 $showResult = new Staff();
 $staffDetails = $showResult -> showStaff($staff_id);
}
// require_once("class/Staff.php");


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

        <?php 
           
                echo "<pre>";
                print_r ($attend);
                echo "</pre>";
            

        ?>

        <section class="row">
            <div class="col">

                    <h1 class="text-center">
                        EMPLOYEE NAME: <?php  echo $staffDetails["staff_fullname"] ;?>
                    </h1>

                    <h3>
                        EMPLOYEE EMAIL: <?php echo $staffDetails["staff_email"] ;?>
                    </h3>

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