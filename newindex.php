<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Attendance Management</title>
</head>
<body>
    <h1>Staff Attendance Management</h1>
    
    <h2>Mark Attendance</h2>
    <form action="mark_attendance.php" method="POST">
        <label for="staff_id">Select Staff:</label>
        <select name="staff_id" id="staff_id">
            <!-- Populate this dropdown with staff options from the database -->
            <option value="1">Staff 1</option>
            <option value="2">Staff 2</option>
            <option value="3">Staff 3</option>
            <!-- Add more options as needed -->
        </select>
        <br>

        <label for="attendance_date">Date:</label>
        <input type="date" name="attendance_date" id="attendance_date" required>
        <br>

        <label for="attendance_status">Attendance Status:</label>
        <select name="attendance_status" id="attendance_status" required>
            <option value="present">Present</option>
            <option value="absent">Absent</option>
        </select>
        <br>

        <input type="submit" value="Mark Attendance">
    </form>
    
    <h2>Staff Information</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Monthly Salary</th>
            <th>Actions</th>
        </tr>
        <!-- Populate this table with staff information from the database -->
        <tr>
            <td>1</td>
            <td>Staff 1</td>
            <td>staff1@example.com</td>
            <td>$10,000</td>
            <td><a href="view_attendance.php?staff_id=1">View Attendance</a></td>
        </tr>
        <!-- Add more rows as needed -->
    </table>
</body>
</html>
