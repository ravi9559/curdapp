<?php 
require 'db.php';

$id =$_GET['id'];



$sql = "SELECT * FROM MyGuests WHERE id='$id' ";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

  if(isset($_POST['send'])){
    $first_name =  $_POST['fname'];
 $last_name = $_POST['lname'];
  $email = $_POST['email'];

$sql2 = "UPDATE MyGuests SET firstname='$first_name', lastname='$last_name', email='$email' WHERE id='$id' ";
  $conn->query($sql2);

    header('Location: index.php');
}
  else {
  echo "Error: " . $sql . "<br>" . $conn->error;
    }
        $conn->close();
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

<div class="container mt-5 container-sm" >

    <center> <h1 class="pb-5">Update details </h1> </center>
    
      
      <form  method="post">
      <div class="mb-3 mt-3">
      <label for="fname">First Name:</label>
      <input type="text" value="<?php echo $row['firstname']; ?>" class="form-control" id="fname" placeholder="Enter first Name" name="fname">
    </div>
    <div class="mb-3 mt-3">
      <label for="lname">Last Name:</label>
      <input type="text" value="<?php echo $row['lastname']; ?>" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
    </div>


    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" value="<?php echo $row['email']; ?>" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    
    
    <button type="submit" name="send" class="btn btn-primary">Submit</button>
  </form>
      
  
</div>







</body>
</html>





