<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "studentList");

if (isset($_POST['update_student'])) {

    $student_id = mysqli_real_escape_string($con, $_POST['Id']);
    $fname = mysqli_real_escape_string($con, $_POST['FirstName']);
    $lname = mysqli_real_escape_string($con, $_POST['LastName']);
    $bdate = mysqli_real_escape_string($con, $_POST['Birthdate']);
    $Address = mysqli_real_escape_string($con, $_POST['Address']);
    $Phone = mysqli_real_escape_string($con, $_POST['Phone']);
    $Email = mysqli_real_escape_string($con, $_POST['Email']);
    
    
    $query = "UPDATE Student SET FirstName='$fname', LastName='$lname', Birthdate='$bdate', Address='$Address', 
    Phone='$Phone', Email='$Email' WHERE id='$student_id'";

 
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }

}