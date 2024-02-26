<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD App</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body class="file1">
  
  <div class="container">
                <?php 
                    if(isset($_SESSION['message']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['message']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['message']);
                    }
                ?>
                
    <h2 class="mt-5 mb-5" >Student Info</h2>
    <form action="add.php" method="POST">
      <div class="mb-5">
        <div class="row">
          <div class="form-group col-md-6 mb3-3">
            <label for="fname">Student Firstname</label>
            <input 
              type="text" 
              name="fname"
              class="form-control"
              id="fname"
              placeholder="Enter Firstname"/>
          </div>
          <div class="form-group col-md-6 mb3-3">
            <label for="lname">Student Lastname</label>
            <input 
              type="text" 
              name="lname"
              class="form-control"
              id="lname"
              placeholder="Enter Lastname"/>
          </div>
          <div class="form-group col-md-6 mb3-3">
            <label for="birthdate">Birthdate</label>
            <input 
              type="Date" 
              name="birthdate"
              class="form-control"
              id="birthdate"
              placeholder="Enter birthdate"/>
          </div>
          <div class="form-group col-md-6 mb3-3">
            <label for="address">Address</label>
            <input 
              type="text" 
              name="address"
              class="form-control"
              id="address"
              placeholder="Enter Address"/>
          </div>
          <div class="form-group col-md-6 mb3-3">
            <label for="email">E-mail</label>
            <input 
              type="text" 
              name="email"
              class="form-control"
              id="email"
              placeholder="Enter E-mail"/>
              <div class="form-group col-md-6 mb3-3">
                <label for="course">Phone/CP number</label>
                <input type="number" id="phone" name="phone" class="form-control" required>
              </div>
              <div class="col-lg-12 mt-5">
                <button class="btn btn-success" id="Submit" name="add_student" >Add Data</button>

                </div>
            </div>
        </div>
     </form>
    <hr>
    <div class="row mt-5">
      <div class="col-12">
        <table class="table table-bordered" id="crudTable">
          <thead>
            <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Birthdate</th>
            <th>Address</th>
            <th>E-mail</th>
            <th>Phone</th>
            <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
             $con = mysqli_connect("localhost", "root", "", "studentList");
             $query =  "SELECT * FROM Student";
             $result = mysqli_query($con, $query);
             $i=1;
             while($row=mysqli_fetch_assoc($result)){
              ?>
                    <tr>
                        <td><?php echo $row['ID']?></td>
                        <td><?php echo $row['FirstName']?></td>
                        <td><?php echo $row['LastName']?></td>
                        <td><?php echo $row['Birthdate']?></td>
                        <td><?php echo $row['Address']?></td>
                        <td><?php echo $row['Email']?></td>
                        <td><?php echo $row['Phone']?></td>
                        <td> <button type="button" class="btn btn-primary" onclick="updateRecord(<?php echo $row['ID']; ?>)">Update</button>
                        <button type="button" class="btn btn-danger" onclick="deleteRecord(<?php echo $row['ID']; ?>)" >Delete</button></td>
                    </tr>
                    
             <?php
             }
            ?>
          </tbody>
        </table>
      </div>
    </div>
</div>

</body>
</html>

<script>
function deleteRecord(id) {
    if(confirm('Are you sure you want to delete this record?')) {
        window.location.href = 'delete.php?delete_id=' + id;
    }
}

function updateRecord(id) {
    window.location.href = 'UpdateForm.php?id=' + id;
}


</script>
