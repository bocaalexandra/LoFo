<!-- probabil trebuie adaugat header('Content-type: image/gif');
	mai trebuie datele userului, si pentru celelalte campuri in afara de username
 -->

<?php
session_start();
 $_SESSION['username'] = "spongebob";  //to do - trebuie luat userul curent (din sesiunea curenta)
?>

<?php
	//if submit button has been clicked
    if(isset($_POST['submit'])){
        move_uploaded_file($_FILES['file']['tmp_name'],"users-pictures/".$_FILES['file']['name']);

        //update the profile pic with the one which has been added by the user
       $con = mysqli_connect("localhost","root","","tehnologiiweb");
       $query = mysqli_query($con,"UPDATE users SET image = '".$_FILES['file']['name']."' WHERE username = '".$_SESSION['username']."'");

    }
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>My Profile</title>
	<link rel="stylesheet" type="text/css" href="profile.css">
    </head>
</head>

<body>
			
	<div class="section">
		<h3>My Profile</h3>

		<form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="file" accept="image/gif, image/jpeg, image/png, image/jpg" id="chooseFile">
            <input type="submit" name="submit" id="subm">
        </form>
		<a href="index_logout.html"><button type="button" id="back" onclick="location.href='index_logout.html';"> Back </button> </a>

		<form class="myInfo">
				
				<label>First Name:</label>
				<input type="text" value = "<?php echo $_SESSION['fname'] ?>" readonly/>
				<br/>
			
				<label>Last Name:</label>
				<input type="text" value="<?php echo $_SESSION['lname'] ?>" readonly />
				<br/>
			
				<label>Username:</label>
				<input type="text" value="<?php echo $_SESSION['username'] ?>" readonly/>
				<br/>
			
				<label>E-mail address:</label>
				<input type="text" value="<?php echo $_SESSION['email'] ?>" readonly> 
				<br/>
		</form>
	</div>
	<?php
        $con = mysqli_connect("localhost","root","","tehnologiiweb");
        $query = mysqli_query($con,"SELECT * FROM users where username = '".$_SESSION['username']."'");

        //while fetching rows from the database
        while($row = mysqli_fetch_assoc($query)){
            if($row['image'] == ""){

            	//if there's no image for the user, set a default img
                echo "<img class='image' src='users-pictures/default.png' alt='Default Profile Picture'>";
            } else {
                    echo "<img class='image' src='users-pictures/".$row['image']."' alt='Profile Picture'>";
            }
        }
    ?>
</body>
</html>