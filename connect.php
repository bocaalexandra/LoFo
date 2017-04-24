<?php


 $servername = "localhost"; 
 $username = "root"; 
 $password = "lostnfound";
 $db ='tehnologiiweb' ;
 
 $con = new mysqli($servername, $username, $password, $db); 
 
	  $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $phone = $_POST['phone'];
	  
  $query = "INSERT INTO users (fname, lname, username, email, password, phone) VALUES ('$fname', '$lname', '$username', '$email', '$password', '$phone')";
  if(mysqli_query($con, $query))
  {
	  echo 'Created.';
  }
  else
  {
    echo 'Not Created.';
  }

  header("refresh:3; url=index.html");
  
 ?>