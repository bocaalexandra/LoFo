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
	
    $servername = "localhost";
	$username = "root";
    $password = "";
    $db ='tehnologiiweb';
	
	$con=mysqli_connect("localhost","root","","tehnologiiweb");
	
	$userid = mysqli_fetch_assoc(mysqli_query($con, "SELECT id FROM users WHERE usernameus= '".$usernameus."'"));

	try {
    	$pdo = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    	// set the PDO error mode to exception
    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	//echo "Connected successfully"; 
    }
	catch(PDOException $e){
    	echo "Connection failed: " . $e->getMessage();
    }


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
			
	<div class="left-section">
		<h3 class = "title">My Profile</h3>

		<form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="file" accept="image/gif, image/jpeg, image/png, image/jpg" id="chooseFile">
            <input type="submit" name="submit" id="subm">
        </form>
		<a href="index_logoutt.php"><button type="button" id="back" onclick="location.href='index_logoutt.php';"> Back </button> </a>

		<form class="myInfo">
				
				<h4>First Name:  <?php echo $fname ?></h4> 
				<br/>
			
				<h4>Last Name: <?php echo $lname ?></h4>
				<br/>
			
				<h4>Username: <?php echo $usernameus ?></h4>
				<br/>
			
				<h4>E-mail address: <?php echo $email ?></h4>
				<br/>
		</form>
	</div>
	<div class="right-section">
			<?php
				$sql = $pdo->query("SELECT * FROM lost WHERE userid= '".$userid['id']."'")->fetchall(PDO::FETCH_ASSOC);

				foreach($sql as $row): ?>
				<div class='announcement-item'>
					<div class='announcement-type announcement-type-lost'><h4>Lost</h4>
					</div>
					<?php //if there is no image set
 						if($row['images'] == ""){ ?>								<div class='announcement-image' style="background-image: url('lost-pictures/default.jpg')">
 									</div>
 
 						<?php }
 						else { ?>
 								
 							<div class='announcement-image' style="background-image: url('lost-pictures/<?php echo $row['images'] ?>')">
 							</div>
 
 				<?php } ?>
					<h3><?php echo $row['nume'];?></h3>
					<div class="announcement-actions">
						
						<!-- The Details Modal -->
						<input type="button" name="details" value="Details" class="btn btn-details" id="b1"/>
						<div id="myModal" class="modal">
								<div class="modal-content">
										<span class="close">&times;</span>
										<form action="" method="post" enctype="multipart/form-data">
											<h4>Name: <?php echo $row['nume'];?> </h4></br>
											<h4>Category: <?php echo $row['dd1'];?>  </h4></br>
											<h4>City: <?php echo $row['dd2'];?></h4></br>
											<h4>Address: <?php echo $row['address'];?></h4></br>
											<h4>Date: <?php echo $row['date'];?> </h4></br>
											<h4>More details: <?php echo $row['specific_description'];?></h4></br>
										</form>
								</div>
						</div>
						<!-- /The Details Modal -->
						
						<!-- The Contact Modal -->
						<input type="button" name="contact" value="Contact" class="btn btn-contact" id="b2">
						<div id="myModal1" class="modal">
							<div class="modal-content">
							<span class="close">&times;</span>
				    		<form action="ex.php" method="post">
								<h5>First Name: </h5><input type="text" name="first_name"></br>
								<h5>Last Name: </h5><input type="text" name="last_name"></br>
								<h5>From: </h5><input type="text" name="email"></br>
								<h5>To: </h5><input type="text" name="email_to"></br>
								<h5>Message: </h5>
								</br>
								<textarea id="txtArea" rows="20" name="message" cols="30">
								</textarea><br>
								<input type="submit" name="submit" value="Send">
							</form>
							</div>
						</div>

						<!-- /The Contact Modal -->
						
						<!-- The Report Modal -->
						<input type="button" name="report" value="Report" class="btn btn-report" id="b3">
						<div id="myModal2" class="modal">
							<div class="modal-content">
								<span class="close">&times;</span>
								<form action="report.php" method="post">
									<h4>Please tell us why do you want to report this announce: </h4></br>
									<input type="radio" name="group1" value="inp"> I think the content is inapropriate</br>
									<input type="radio" name="group1" value="inp2"> I don't think this should be on this site</br>
									<input type="radio" name="group1" value="inp3"> This object was stoled</br>
									<input type="radio" name="group1" value="inp4"> This announce is more than once on this website</br>
									<input type="radio" name="group1" value="inp5"> Other reason (Please specify down below)</br>
							        </br><textarea placeholder="Why do you want to report this announce?" id="txtArea2" rows="20" name="message2" cols="30"></textarea><br>
									<input type="submit" name="submit2" value="Submit report">
								</form>
							</div>
						</div>
						<!-- /The Report Modal -->
					</div>
					
				</div>
				<?php
    			endforeach;
			?>
		<?php
				$sql = $pdo->query("SELECT * FROM found WHERE userid= '".$userid['id']."'")->fetchall(PDO::FETCH_ASSOC);

				foreach($sql as $row): ?>
				<div class='announcement-item'>
					<div class='announcement-type announcement-type-found'><h4>Found</h4>
					</div>
					<?php //if there is no image set
 						if($row['images'] == ""){ ?>								<div class='announcement-image' style="background-image: url('found-pictures/default.jpg')">
 									</div>
 
 						<?php }
 						else { ?>
 								
 							<div class='announcement-image' style="background-image: url('found-pictures/<?php echo $row['images'] ?>')">
 							</div>
 
 				<?php } ?>


					<h3><?php echo $row['nume'];?></h3>
					<div class="announcement-actions">
						
						<!-- The Details Modal -->
						<input type="button" name="details" value="Details" class="btn btn-details" id="b1"/>
						<div id="myModal" class="modal">
								<div class="modal-content">
										<span class="close">&times;</span>
										<form action="" method="post" enctype="multipart/form-data">
											<h4>Name: <?php echo $row['nume'];?> </h4></br>
											<h4>Category: <?php echo $row['dd1'];?>  </h4></br>
											<h4>City: <?php echo $row['dd2'];?></h4></br>
											<h4>Address: <?php echo $row['address'];?></h4></br>
											<h4>Date: <?php echo $row['date'];?> </h4></br>
											<h4>More details: <?php echo $row['specific_description'];?></h4></br>
										</form>
								</div>
						</div>
						<!-- /The Details Modal -->
						
						<!-- The Contact Modal -->
						<input type="button" name="contact" value="Contact" class="btn btn-contact" id="b2">
						<div id="myModal1" class="modal">
							<div class="modal-content">
							<span class="close">&times;</span>
				    		<form action="ex.php" method="post">
								<h5>First Name: </h5><input type="text" name="first_name"></br>
								<h5>Last Name: </h5><input type="text" name="last_name"></br>
								<h5>From: </h5><input type="text" name="email"></br>
								<h5>To: </h5><input type="text" name="email_to"></br>
								<h5>Message: </h5>
								</br>
								<textarea id="txtArea" rows="20" name="message" cols="30">
								</textarea><br>
								<input type="submit" name="submit" value="Send">
							</form>
							</div>
						</div>

						<!-- /The Contact Modal -->
						
						<!-- The Report Modal -->
						<input type="button" name="report" value="Report" class="btn btn-report" id="b3">
						<div id="myModal2" class="modal">
							<div class="modal-content">
								<span class="close">&times;</span>
								<form action="report.php" method="post">
									<h4>Please tell us why do you want to report this announce: </h4></br>
									<input type="radio" name="group1" value="inp"> I think the content is inapropriate</br>
									<input type="radio" name="group1" value="inp2"> I don't think this should be on this site</br>
									<input type="radio" name="group1" value="inp3"> This object was stoled</br>
									<input type="radio" name="group1" value="inp4"> This announce is more than once on this website</br>
									<input type="radio" name="group1" value="inp5"> Other reason (Please specify down below)</br>
							        </br><textarea placeholder="Why do you want to report this announce?" id="txtArea2" rows="20" name="message2" cols="30"></textarea><br>
									<input type="submit" name="submit2" value="Submit report">
								</form>
							</div>
						</div>
						<!-- /The Report Modal -->
					</div>
					
				</div>
				<?php
    			endforeach;
			?>
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
