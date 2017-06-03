<!-- probabil trebuie adaugat header('Content-type: image/gif');
	mai trebuie datele userului, si pentru celelalte campuri in afara de username
 -->

<?php
	include 'login.php';
	session_start();
	
	if( !isset($_SESSION['sess_user']) ){
	    header("location:login.html");
	    exit();
	}
	$usernameus = $_SESSION['sess_user'];
	$con =  mysqli_connect("localhost","root","","tehnologiiweb");

	//if submit button has been clicked
    if(isset($_POST['submit'])){
        move_uploaded_file($_FILES['file']['tmp_name'],"users-pictures/".$_FILES['file']['name']);

        //update the profile pic with the one which has been added by the user
       $query = mysqli_query($con,"UPDATE users SET images = '".$_FILES['file']['name']."' WHERE usernameus = '".$usernameus."'");

    }
    $q = mysqli_query($con,"SELECT fname, lname, email FROM users where usernameus = '".$usernameus."'");
    $row = mysqli_fetch_assoc($q);
    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];

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
				<input type="text" value = "<?php echo $fname ?>" readonly/>
				<br/>
			
				<label>Last Name:</label>
				<input type="text" value="<?php echo $lname ?>" readonly />
				<br/>
			
				<label>Username:</label>
				<input type="text" value="<?php echo $usernameus ?>" readonly/>
				<br/>
			
				<label>E-mail address:</label>
				<input type="text" value="<?php echo $email ?>" readonly> 
				<br/>
		</form>
	</div>
	<?php
		$usernameus = $_SESSION['sess_user'];
        $con =  mysqli_connect("localhost","root","","tehnologiiweb");
        $query = mysqli_query($con,"SELECT images FROM users where usernameus = '".$usernameus."'");

        //while fetching rows from the database
        while($row = mysqli_fetch_assoc($query)){
            if($row['images'] == ""){

            	//if there's no image for the user, set a default img
                echo "<img class='image' src='users-pictures/default.png' alt='Default Profile Picture'>";
            } else {
                    echo "<img class='image' src='users-pictures/".$row['images']."' alt='Profile Picture'>";
            }
        }
    ?>
</body>
</html>