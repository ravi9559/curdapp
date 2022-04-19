<?php
 include 'db.php';


 $first_name =  $_REQUEST['fname'];
 $last_name = $_REQUEST['lname'];
  $email = $_REQUEST['email'];


 
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('$first_name', '$last_name','$email')";

if ($conn->query($sql) === TRUE) {
  header('Location: index.php');
    
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>