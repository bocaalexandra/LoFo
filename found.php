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

    $result = mysqli_query($con, "INSERT INTO found (userid, nume, address, date, specific_description, dd1, dd2) VALUES ('$userid', '$nume', '$address', '$date', '$specific_description', '$dd1', '$dd2')");
    $id = mysqli_fetch_assoc(mysqli_query($con,"SELECT id FROM found ORDER BY id DESC LIMIT 1"));


   //if submit button has been clicked
    if(isset($_POST['found'])){
        move_uploaded_file($_FILES['filename']['tmp_name'],"found-pictures/".$_FILES['filename']['name']);

        //update the picture with the one which has been added within the announcement
       $q = mysqli_query($con,"UPDATE found SET images = '".$_FILES['filename']['name']."' WHERE id = '".$id['id']."'");

       /*$check_image = mysqli_query($con,"SELECT images FROM found where id = '".$id['id']."'");
       while($img = mysqli_fetch_assoc($check_image)){
            if($img['images'] == ""){

                //if there's no image, set a default img
                $filePath = "found-pictures/default.jpg";
                $blob = fopen($filePath, "rb");
                $set_image = mysqli_query($con,"UPDATE found SET images = '". $blob."' WHERE id = '".$id['id']."'");
            }
        } */

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