<?php

  session_start();
  if( !isset($_SESSION['sess_user']) ){
      header("location:login.html");
      exit();
  }
  $usernameus = $_SESSION['sess_user'];  
  $con =  mysqli_connect("localhost","root","","tehnologiiweb");

  $nume = $_POST['nume'];
  $address = $_POST['address'];
  $date = $_POST['date'];
  $specific_description = $_POST['specific_description'];
  $dd1 = $_POST['dd1']; /* dd1 for category */
  $dd2 = $_POST['dd2']; /*dd2 for city*/

  $resultid = mysqli_fetch_assoc(mysqli_query($con,"SELECT id from users WHERE usernameus = '".$usernameus."'"));
  $userid = $resultid['id'];

  $result = mysqli_query($con, "INSERT INTO lost (userid, nume, address, date, specific_description, dd1, dd2) VALUES ('$userid', '$nume', '$address', '$date', '$specific_description', '$dd1', '$dd2')");

  //if submit button has been clicked
    if(isset($_POST['submit'])){
        move_uploaded_file($_FILES['filename']['tmp_name'],"lost-pictures/".$_FILES['filename']['name']);

        //update the picture with the one which has been added within the announcement
       $q = mysqli_query($con,"UPDATE lost SET images = '".$_FILES['filename']['name']."' WHERE userid = '".$userid."'");

    }

  if($result) {
      echo 'The announcement has been added.';
  }
  else {
    echo 'The announcement hasn\'t been added.';
  }

  /*
        de scos din comentariu. ma trimitea de pe lost, pe anunturi
  header("refresh:3; url=announcements.html"); */



?>