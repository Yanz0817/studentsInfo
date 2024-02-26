<?php
session_start();
$con = mysqli_connect("localhost","root","","StudentList");

if(isset($_POST['add_student']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $bdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    

    
    $query = "INSERT INTO Student( Firstname, LastName, Birthdate, Address, Phone, Email) VALUES ('$fname', '$lname', '$bdate', '$address', '$phone', '$email')"; 
    $query_run = mysqli_query($con, $query);
  
 
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: index.php");
        exit(0);
    }
}

?>