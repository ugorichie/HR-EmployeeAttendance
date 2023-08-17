<?php
// We need to require our class (methods), this is a common  practice that allows us access our database
// you can either use ( require // require_once // include // include_once )
require_once("class/Staff.php");
session_start();


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <title>Staff Attendance Management</title>
    </head>

<body>
    <div class="row">
        <h1 class="text-center col text-danger">Staff Attendance Management</h1>
    </div>

    <section class="row ">
        <div class="col text-center my-2"> 
                <h2>Mark Attendance</h2>

                <!-- THIS IS A SESSION (isset) TO CATCH AND DISPLAY AN ERROR OR SUCCESS MESSAGE FOR USER EXPERIENCE , IT IS A BOOTSTRAP CL-->

                    <?php
                        if(isset($_SESSION["staffs_success"])){
                    ?>
                    <div class="alert alert-success alert-dismissible fade show col-11 col-md-7" role="alert">
                            <?php echo $_SESSION["staffs_success"] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        
                    <?php 
                        unset ($_SESSION["staffs_success"]);
                        }
                    ?>

                <form action="process/mark_attendance.php" method="POST">

                    <label for="staff_id">Select Staff:</label>

                        <select name="staffs" id="staff_id"> 
                            <!--  this dropdown populates staff options from the database -->
                            <option value="#"> SELECT STAFF </option> 
                            
                            <?php 
                                foreach($checker as $staff) {
                            ?>
                                <option value="<?php echo $staff['staff_id']?>"> <?php echo $staff["staff_fullname"]?></option>
                            <?php 
                                }
                            ?>
                        </select>
                    <br>

                        <label for="attendance_date">Date:</label>
                        <input type="date" name="attend_date" id="attendance_date" required>
                    <br>

                    <label for="attendance_status">Attendance Status:</label>
                        <select name="attend_status" id="attendance_status" required>
                            <option value="#">SELECT STATUS </option>
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                        </select>
                    <br>

                    <input type="submit" value="Mark Attendance" name="attend_button">
                </form>
        </div>

    </section>
    
    <h2 class="text-center py-2">Staff Update Information</h2>

    <table class="table table-hover table-striped table-center">
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>Email</th>
            <th>Supposed Monthly Salary</th>
            <th>Current Salary & Attendance Details</th>
            
        </tr>
        <!-- this table is populated with staff information from the database -->
        <?php
            $counter = 1;
             foreach($checker as $staff){
        ?>
           
            <tr>
                <td><?php echo $counter++ ?></td>
                <td><?php echo $staff["staff_fullname"] ?></td>
                <td><?php echo $staff["staff_email"] ?></td>
                <td>#<?php echo $staff["staff_salary"] ?></td>
                
                <td><a href = "view_attendance.php?staff_id=<?php echo$staff["staff_id"] ?> "> View Attendance </a></td>
            </tr>
        <?php
            }
        ?>
        <!-- Add more rows as needed -->
    </table>




    <script src="bootstrap/js/bootstrap.bundle.js"> </script>

    </script>
</body>
</html>
