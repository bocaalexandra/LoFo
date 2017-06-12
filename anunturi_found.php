<?php 

	/*include 'login.php';
	session_start();
	if( !isset($_SESSION['sess_user']) ){
	    header("location:login.html");
	    exit();
	}
	$usernameus = $_SESSION['sess_user']; 
	 */

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
  
    //pagination
     try{
 
     	 // how many items are in the table
     	$total = $pdo->query('SELECT COUNT(*) FROM found')->fetchColumn();
 
     	// how many items / page
     	$limit = 8;
 
     	// how many pages to display
    		$pages = ceil($total / $limit);
 
    		// what page are we currently on?
    		$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array( 'options' => array('default'   => 1,'min_range' => 1, ), )));
    		
    		// Calculate the offset for the query
    		$offset = ($page - 1)  * $limit;
 
    	    // Some information to display to the user
    	    $start = $offset + 1;
     	$end = min(($offset + $limit), $total);
 
     	// Prepare the paged query
    		 $stmt = $pdo->prepare('
         SELECT * FROM found ORDER BY id LIMIT :limit OFFSET :offset');
 
     	// Bind the query params
 	    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
 	    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
 	    $stmt->execute();

?>

<!DOCTYPE html>
<html>
<head>
	<!-- TITLE -->
	<title>LoFo</title>
	
	<!-- META -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1, width=device-width, user-scalable=no">

	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Handlee|Lato:300,400,700,900" rel="stylesheet">

	<!-- STYLES -->
	<link rel="stylesheet" type="text/css" href="anunturi_found.css">
</head>
<body>
	<header>
		<div class="container clearfix">
			<div class="logo-wrap pull-left">
				<a href="#" class="logo">LoFo</a>
			</div>
			<nav class="pull-right">
				<ul>
					<li><a href="#" onclick="location.href='login.html'">Login</a></li>
					<li><a href="#" onclick="location.href='inregistrare.html'">Register</a></li>
					<li><a href="#" class="btn btn-report" onclick="location.href='find.html'">+ Add new</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<div class="main-wrapper">
		<div class="container">
			<div class="actions-container clearfix">
				<div class="actions-wrap filters-wrap pull-left">
					<a href="#" class="action-item filter-item" onclick="location.href='anunturi.php'">All</a>
					<a href="#" class="action-item filter-item" onclick="location.href='anunturi_lost.php'">Lost</a>
					<a href="#" class="action-item filter-item active">Found</a>
				</div>
				<div class="actions-wrap orders-wrap pull-right">
					<a href="#" class="action-item order-item" onclick="location.href='new_found.php'">New</a>
					<a href="#" class="action-item order-item" onclick="location.href='old_found.php'">Old</a>
				</div>
			</div>
			<div class="announcements-wrap clearfix">

			
			<?php
				//$sql = $pdo->query("SELECT * FROM found")->fetchall(PDO::FETCH_ASSOC);
				//foreach($sql as $row): 
				// Prepare the paged query
 		   		$stmt = $pdo->prepare('
 		        SELECT * FROM found ORDER BY id LIMIT :limit OFFSET :offset');
 
     			// Bind the query params
 			    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
 			    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
 			    $stmt->execute();
 
 				// Check if there are results
 	    		if ($stmt->rowCount() > 0) {
 
 			    // how to fetch the results
 			    $stmt->setFetchMode(PDO::FETCH_ASSOC);
 			    $iterator = new IteratorIterator($stmt);	
 
 				// Display the results

				foreach ($iterator as $row) { ?>
 
 					<div class='announcement-item'>
 						<div class='announcement-type announcement-type-found'>
 						<h4>Lost</h4>
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
    			} //end foreach
 			} else {
 				?>
 				 <script> alert( 'No results could be displayed!');	</script>
 				 <?php
 			} //endif
 		} //end try
     		
     	catch (Exception $e) { ?>
     		<script>
 	   		 	alert( ' <?php $e->getMessage() ?>' );
 	   		 </script>
 		<?php
 		}	//end catch	
 		?>

			</div>
		</div>
	</div>


 	<!-- Paging information -->
 	<?php
 	// back 
     $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';
 
     // next
     $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';
 
     // pages displayed 
     echo '<div><p style=" margin: 0 auto; text-align: center; color: #50394c; line-height:1; font-family: cursive, sans-serif"; >', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';
     ?>

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
