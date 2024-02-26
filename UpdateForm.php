<?php

session_start();
$con = mysqli_connect("localhost", "root", "", "StudentList");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Student Edit</title>
</head>
<body class="file2">
  
    <div class="container mt-5">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Edit 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM Student WHERE id='$student_id'";
                            
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $row = mysqli_fetch_array($query_run);
                                ?>
                                <form action="Update.php" method="POST">
                                     <div class="mb-3">
                                        <label>Student ID</label>
                                        <input type="text" name="Id" value="<?=$row['ID'];?>" class="form-control" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label>Student Firstname</label>
                                        <input type="text" name="FirstName" value="<?=$row['FirstName'];?>" class="form-control" Required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Lastname</label>
                                        <input type="text" name="LastName" value="<?=$row['LastName'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Birthdate</label>
                                        <input type="date" name="Birthdate" value="<?=$row['Birthdate'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Address</label>
                                        <input type="text" name="Address" value="<?=$row['Address'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="text" name="Email" value="<?=$row['Email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Phone number</label>
                                        <input type="number" name="Phone" value="<?=$row['Phone'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn btn-primary">
                                            Update Student
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>