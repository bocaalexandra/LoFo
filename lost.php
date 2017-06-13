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

  $id = mysqli_fetch_assoc(mysqli_query($con,"SELECT id FROM lost ORDER BY id DESC LIMIT 1"));
  
  //if submit button has been clicked
    if(isset($_POST['lost'])){
        move_uploaded_file($_FILES['filename']['tmp_name'],"lost-pictures/".$_FILES['filename']['name']);

        //update the picture with the one which has been added within the announcement
       $q = mysqli_query($con,"UPDATE lost SET images = '".$_FILES['filename']['name']."' WHERE id = '".$id['id']."'");

       /*$check_image = mysqli_query($con,"SELECT images FROM lost where id = '".$id['id']."'");
       while($img = mysqli_fetch_assoc($check_image)){
            if($img['images'] == ""){

                //if there's no image, set a default img
                $filePath = "lost-pictures/default.jpg";
                $blob = fopen($filePath, "rb");
                $set_image = mysqli_query($con,"UPDATE lost SET images = '". $blob."' WHERE id = '".$id['id']."'");
            }
        }
        */
    }

   if($result) { ?>
      <script> alert ('The announcement has been added.'); </script>
	 <?php header("refresh:3; url=index_logoutt.php"); 
  }
  else { ?>
	<script> alert ('The announcement hasn\'t been added.'); </script>
   <?php echo 'The announcement hasn\'t been added.';
  }



?>