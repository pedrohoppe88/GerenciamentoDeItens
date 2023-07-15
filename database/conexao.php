<?php
  $servername = "localhost";
  $username = "root";
  $password = "lasanh@123";
  $dbname = "GerenciamentoDeItems";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);  // now you need put'new'
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";
  mysqli_close($conn);
  
?>