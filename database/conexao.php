<?php
  $servername = "localhost";
  $username = "root";
  $password = "asasasas";
  $dbname = "bichochiquedds";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);  // now you need put'new'
  if (mysqli_connect_errno())
  {
      die("Connection failed: " . mysqli_connect_error());
  } else {
    echo "Connected successfully";
    $mysqli->close();
  }
  
?>