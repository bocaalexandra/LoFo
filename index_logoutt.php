<?php 

	$servername = "localhost";
	$username = "root";
    $password = "";
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
				<h3 id="recent">Most recent announcements!</h3>
				<?php
				$sql = $pdo->query("SELECT * FROM found ORDER BY id DESC LIMIT 4")->fetchall(PDO::FETCH_ASSOC);
				foreach($sql as $row):  ?> 
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
