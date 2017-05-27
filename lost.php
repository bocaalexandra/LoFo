<?php


 $servername = "localhost";
 $username = "root";
 $password = "lostnfound";
 $db ='tehnologiiweb' ;

 $con = new mysqli($servername, $username, $password, $db);


	  $nume = $_POST['nume'];
      $address = $_POST['address'];
      $date = $_POST['date'];
      $specific_description = $_POST['specific_description'];
	  $dd1 = $_POST['dd1'];
	  $dd2 = $_POST['dd2'];
	  $filename = $_FILES['filename']['tmp_name'];

  $query = "INSERT INTO lost (nume, address, date, specific_description, dd1, dd2) VALUES ('$nume', '$address', '$date', '$specific_description', '$dd1', '$dd2')";

  if(!isset($filename))
     echo "Please select an image.";
  else
  {
       $filename = addslashes(file_get_contents($_FILES['filename']['tmp_name']));
       $image_name = addslashes($_FILES['filename']['name']);
       $image_name = getimagesize($_FILES['filename']['tmp_name']);
  }

  if(mysqli_query($con, $query))
  {
	  echo 'The announcement has been added.';
  }
  else
  {
    echo 'The announcement hasn't been added.';
  }

   header("refresh:3; url=announcements.html");



?>