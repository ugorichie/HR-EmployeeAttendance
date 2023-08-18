<?php

class Salary extends Db {



    public function applyDeduction($date, $staff_Id, $staff_Salary ) {
    
            // Retrieve staff's monthly salary from the 'staff' table based on staff ID
            $sql = "SELECT staff_salary FROM staff WHERE staff_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$staff_Id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($row) {
                $Staff_Salary = $row['staff_salary'];
                
                // Setting deduction amount (assuming 400 is deducted as penalty fee for being absent)
                $dailyDeduction = 400;
        
                // Calculate new monthly staff salary after deduction
                $newStaff_Salary = $Staff_Salary - $dailyDeduction;
        
                // Update staff's monthly salary in the 'staff' table
                $sql = "UPDATE staff SET staff_salary = ? WHERE staff_id = ?";
                $stmt = $this->connect()->prepare($sql);
                $updatedSalary = $stmt->execute([$newStaff_Salary, $staff_Id]);
        
                if ($updatedSalary) {
                    // Insert a record into 'salary' table for the absent days, to be displayed in the GUI
                    $sql = "INSERT INTO salary (staff_id, date) VALUES (?, ?)";
                    $stmt = $this->connect()->prepare($sql);
                    $result = $stmt->execute([$staff_Id, $date]);
                    return $result;
                } else {
                    return false; // Return false if the salary update fails
                }
            }
        
            return false; // Return false if staff ID is not found
        }
        

    }

// }