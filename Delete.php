<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "StudentList");

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $delete = "DELETE FROM Student WHERE id='$id'"; // Corrected 'id' -> id
    $delete_run = mysqli_query($con, $delete);

    if($delete_run) {
        // Success message or redirect
        header('Location: index.php?success=1');
    } else {
        // Error handling
        header('Location: index.php?error=1');
    }
}
?>