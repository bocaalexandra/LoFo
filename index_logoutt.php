<?php 

	$servername = "localhost";
	$username = "root";
    $password = "lostnfound";
    $db ='tehnologiiweb';

	try {
    	$pdo = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    	// set the PDO error mode to exception
    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	//echo "Connected successfully"; 
    }
	catch(PDOException $e){
    	echo "Connection failed: " . $e->getMessage();
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lost And Found</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <div id="wrapper" >
        <div id="top-part">
            <div class="leftSide">
                <img src="logo.png" alt="Logo" style="border-radius:2px;float:left;width:110px;height:90px;">
            </div>
            <div class="centerSide">
                <h4 id="titlu">The Museum of Lost'n Found Objects</h4>
            </div>
            <div class="rightSide">
                <h4 id="login"><a href="login.html"  class="nounderline" >Logout</a> | <a href="inregistrare.html"  class="nounderline">My Profile</a></h4>
            </div>
        </div>
        <div class="clear"></div>
        <!-- <div id="center-part"> -->
        <div class="searchBar">
            <div class="searchItems">
                <input type="text" placeholder="search..." required id="search">
                <input type="button" value="Search" id="bsearch">
                <input type="button" value="Advanced" id="adv" onclick="location.href='search.html';">
            </div>
            <div class="userReporting">
                <a href="lost.html" class="lostItem">
                    <p>report a lost item</p>
                </a>
                <a href="find.html" class="foundItem">
                    <p>report a found item</p>
                </a>
            </div>
        </div>
        <!-- </div> -->
        <div id="center-part" >
            <div class="clear"></div>
            <div class="boxSlider" >
                <div id="slideshow">
                    <div class="w3-content w3-display-container sliderBoxing">
                        <div class="w3-display-container mySlides" style="border-radius:5px;">
                            <img id="shadow1" src="c.png" style="width:70%; height: 270px; border-radius:5px;" alt="img">
                            <div class="w3-display-topright w3-large w3-container w3-padding-16 w3-black"></div>
                        </div>
                        <div class="w3-display-container mySlides">
                            <img id="shadow2" src="a.jpg" style="width:90%; border-radius:5px;" alt="img2">
                            <div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black"></div>
                        </div>
                        <div class="w3-display-container mySlides">
                            <img id="shadow3" src="b.jpeg" style="width:90%; border-radius:5px;" alt="img3">
                            <div class="w3-display-topleft w3-large w3-container w3-padding-16 w3-black"></div>
                        </div>
                        <div class="w3-display-container mySlides" style="border-radius:5px;">
                            <img id="shadow4" src="d.jpg" style="width:90%; height: 270px; border-radius:5px;" alt="img4">
                            <div class="w3-display-topright w3-large w3-container w3-padding-16 w3-black"></div>
                        </div>
                        <button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
                        <button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
                    </div>
                    <script>
                    var slideIndex = 1;
                    showDivs(slideIndex);

                    function plusDivs(n) {
                        showDivs(slideIndex += n);
                    }

                    function showDivs(n) {
                        var i;
                        var x = document.getElementsByClassName("mySlides");
                        if (n > x.length) {
                            slideIndex = 1
                        }
                        if (n < 1) {
                            slideIndex = x.length
                        }
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        x[slideIndex - 1].style.display = "block";
                    }
                    </script>
			
				</div> <!-- /slideshow -->
			<!-- Anunturi -->
			
				<?php
				$sql = $pdo->query("SELECT * FROM found ORDER BY id DESC LIMIT 4")->fetchall(PDO::FETCH_ASSOC);
				foreach($sql as $row):  ?> 
				<div class='announcement-item'>
					<div class='announcement-type announcement-type-found'><h4>Found</h4>
					</div>
					<div class='announcement-image' style="background-image: url('found-pictures/<?php echo $row['images'] ?>')">
					</div>
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
				$sql = $pdo->query("SELECT * FROM lost ORDER BY id DESC LIMIT 4")->fetchall(PDO::FETCH_ASSOC);
				foreach($sql as $row):  ?> 
				<div class='announcement-item'>
					<div class='announcement-type announcement-type-lost'><h4>Lost</h4>
					</div>
					<div class='announcement-image' style="background-image: url('lost-pictures/<?php echo $row['images'] ?>')">
					</div>
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
		
			
			
	
					
			
		    <form action="anunturi.php">
                 <input type="submit" value="See all" id="seeall" >
            </form> 
			    
            </div> <!-- /boxslider-->
	</div> <!-- /center-part -->
</div>  <!-- /wrapper-->
	<footer>
		<p>Copyright &#169; 2017</p>
	</footer>
	
	<!-- Functions for modals -->
	<script>

	var modal = document.getElementById('myModal');
	var modal2 = document.getElementById('myModal1');
	var modal3 = document.getElementById('myModal2');

	var btn = document.getElementById("b1");
	var btn2 = document.getElementById("b2");
	var btn3 = document.getElementById("b3");

	var span = document.getElementsByClassName("close");
	var span2 = document.getElementsByClassName("close");
	var span3 = document.getElementsByClassName("close");
	

	btn.onclick = function() {
	    modal.style.display = "block";
	}

	btn2.onclick = function() {
	    modal2.style.display = "block";
	}

	btn3.onclick = function() {
	    modal3.style.display = "block";
	}

	span.onclick = function() {
	    modal.style.display = "none";

	}

	span2.onclick = function() {
	    modal2.style.display = "none";

	}

	span3.onclick = function() {
	    modal3.style.display = "none";

	}


	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
		if (event.target == modal2) {
	        modal2.style.display = "none";
	    }
		if (event.target == modal3) {
	        modal3.style.display = "none";
	    }
	}

	</script>
</body>

</html>
