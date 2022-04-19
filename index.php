<?php 
require 'db.php';

$sql = "SELECT * FROM MyGuests";
$result = $conn->query($sql);

  ?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-5" >

    <table class="table">
    
        <tbody>
        <tr>
        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add</button></td>
        
         <td class="float-xl-end"><button type="button" class="btn btn-primary">Print</button>
        
        </td>
        
      </tr>
      
      
        
     
    </tbody>
  </table>


  
  
  <table class="table">
    <thead>
      <tr>
      <th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th> Update</th>
      </tr>
    </thead>
    <tbody>

    <?php  if ($result->num_rows > 0) {
            // output data of each row
        while($row = $result->fetch_assoc()) {
        ?>
      <tr>
        
          <td> <?php echo $row["id"]; ?> </td>
            <td><?php echo $row["firstname"]; ?></td>
            <td> <?php echo $row["lastname"]; ?> </td>
            <td> <?php echo $row["email"]; ?></td>
            <td>
            <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php } } else{
          ?>
          <td> <?php echo "0 results"; ?></td>
           <?php
           $conn->close();
        }
        ?>
      
    </tbody>
  </table>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="add.php" method="post">
      <div class="mb-3 mt-3">
      <label for="fname">First Name:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter first Name" name="fname">
    </div>
    <div class="mb-3 mt-3">
      <label for="lname">Last Name:</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
    </div>


    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>







</body>
</html>
