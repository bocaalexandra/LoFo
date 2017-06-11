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
	<link rel="stylesheet" type="text/css" href="anunturi.css">
</head>
<body>
	<header>
		<div class="container clearfix">
			<div class="logo-wrap pull-left">
				<a href="#" class="logo">LoFo</a>
			</div>
			<nav class="pull-right">
				<ul>
					<li><a href="#">Login</a></li>
					<li><a href="#">Register</a></li>
					<li><a href="#" class="btn btn-report">+ Add new</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<div class="main-wrapper">
		<div class="container">
			<div class="actions-container clearfix">
				<div class="actions-wrap filters-wrap pull-left">
					<a href="#" class="action-item filter-item active">All</a>
					<a href="#" class="action-item filter-item">Lost</a>
					<a href="#" class="action-item filter-item">Found</a>
				</div>
				<div class="actions-wrap orders-wrap pull-right">
					<a href="#" class="action-item order-item active">New</a>
					<a href="#" class="action-item order-item">Old</a>
				</div>
			</div>
			<div class="announcements-wrap clearfix">

			<!-- First item-->

				<div class="announcement-item">
					<div class="announcement-type announcement-type-lost">
						<h4>Lost</h4>
					</div>
					<div class="announcement-image" style="background-image: url('announcements-pictures/birmaneza.jpg')"></div>
					<h3>Pisica Birmaneza</h3>
					<div class="announcement-actions">
						
						<!-- The Details Modal -->
						<input type="button" name="details" value="Details" class="btn btn-details" id="b1"/>
						<div id="myModal" class="modal">
								<div class="modal-content">
										<span class="close">&times;</span>
										<form action="" method="post" enctype="multipart/form-data">
											<h4>Name:  </h4></br>
											<h4>Category:  </h4></br>
											<h4>City: </h4></br>
											<h4>Address: </h4></br>
											<h4>Date:  </h4></br>
											<h4>More details: </h4></br>
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
						<input type="button" name="report" value="Report" class="btn btn-report"" id="b3">
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
			<!-- /First item-->



				<div class="announcement-item">
					<div class="announcement-type announcement-type-found">
						<h4>Found</h4>
					</div>
					<div class="announcement-image" style="background-image: url('announcements-pictures/birmaneza.jpg')"></div>
					<h3>Pisica Birmaneza</h3>
					<div class="announcement-actions">
						<a href="#" class="btn btn-details">Details</a>
						<a href="#" class="btn btn-contact">Contact</a>
						<a href="#" class="btn btn-report">Report</a>
					</div>
				</div>
				<div class="announcement-item">
					<div class="announcement-type announcement-type-lost">
						<h4>Lost</h4>
					</div>
					<div class="announcement-image" style="background-image: url('announcements-pictures/birmaneza.jpg')"></div>
					<h3>Pisica Birmaneza</h3>
					<div class="announcement-actions">
						<a href="#" class="btn btn-details">Details</a>
						<a href="#" class="btn btn-contact">Contact</a>
						<a href="#" class="btn btn-report">Report</a>
					</div>
				</div>
				<div class="announcement-item">
					<div class="announcement-type announcement-type-found">
						<h4>Found</h4>
					</div>
					<div class="announcement-image" style="background-image: url('announcements-pictures/birmaneza.jpg')"></div>
					<h3>Pisica Birmaneza</h3>
					<div class="announcement-actions">
						<a href="#" class="btn btn-details">Details</a>
						<a href="#" class="btn btn-contact">Contact</a>
						<a href="#" class="btn btn-report">Report</a>
					</div>
				</div>
				<div class="announcement-item">
					<div class="announcement-type announcement-type-lost">
						<h4>Lost</h4>
					</div>
					<div class="announcement-image" style="background-image: url('announcements-pictures/birmaneza.jpg')"></div>
					<h3>Pisica Birmaneza</h3>
					<div class="announcement-actions">
						<a href="#" class="btn btn-details">Details</a>
						<a href="#" class="btn btn-contact">Contact</a>
						<a href="#" class="btn btn-report">Report</a>
					</div>
				</div>
			</div>
		</div>
	</div>

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