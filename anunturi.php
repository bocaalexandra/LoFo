<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lost And Found</title>
    <link rel="stylesheet" type="text/css" href="anunturi.css">
</head>

<body>
    <div id="wrapper">
        <div id="top-part">
            
			<div class="tab">
				<button class="tablinks" onclick="openPage(event, 'Lost')">Lost</button>
				<button class="tablinks" onclick="openPage(event, 'Found')">Found</button>
			</div>

			<div id="Lost" class="tabcontent">
				<h3>Lost announces</h3>	
		
			</div>
	 
			<div id="Found" class="tabcontent">
				<h3>Found</h3>
				<p>Aici sunt toate anunturile found</p> 
			</div>
			
        </div>
        <div class="clear"></div>
        <!-- <div id="center-part"> -->
        <div class="anunt">
           		<p>This is an announce!
				<form action="" method="post" enctype="multipart/form-data">  <?php echo "tanana "?>
                </form>
				 </p
		<!-- Open The Modal -->
		<input type="button" name="details" value="Details" class="button" id="b1">
		<!-- The Modal -->
		<div id="myModal" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			<span class="close">&times;</span>
				<h4>Name: </h4></br>
				<h4>Category: </h4></br>
				<h4>City: </h4></br>
				<h4>Address: </h4></br>
				<h4>Date: </h4></br>
				<h4>More details: </h4></br>
		</div>

		</div>
            
			<input type="button" name="contact" value="Contact" class="button" id="b2">
			<div id="myModal1" class="modal">
			<div class="modal-content">
			<span class="close">&times;</span>
	
            <form action="ex.php" method="post">
				<h5>First Name: </h5><input type="text" name="first_name"></br>
				<h5>Last Name: </h5><input type="text" name="last_name"></br>
				<h5>From: </h5><input type="text" name="email"></br>
				<h5>To: </h5><input type="text" name="email_to"></br>
				<h5>Message: </h5>
				</br><textarea id="txtArea" rows="20" name="message" cols="30"></textarea><br>
			<input type="submit" name="submit" value="Send">
			</form>
				
				
			</div>

			</div>
			
			<input type="button" name="report" value="Report" class="button" id="b3">
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
		</div>
		
		<div class="anunt">
           		<p>This is an announce!</p>
				<?php echo "tanana "?>
		    <input type="button" name="details" value="Details" class="button" id="b4">
			<input type="button" name="contact" value="Contact" class="button" id="b5">
			<input type="button" name="report" value="Report" class="button" id="b6">

		</div>
		
		<div class="anunt">
           		<p>This is an announce!</p>
				<?php echo "tanana "?>
		    <input type="button" name="details" value="Details" class="button" id="b7">
			<input type="button" name="contact" value="Contact" class="button" id="b8">
			<input type="button" name="report" value="Report" class="button" id="b9">

		</div>
		
		<div class="anunt">
           		<p>This is an announce!</p>

		</div>
		
		<div class="anunt">
           		<p>This is an announce!</p>

		</div>
		
		<div class="anunt">
           		<p>This is an announce!</p>

		</div>
		
		<div class="anunt">
           		<p>This is an announce!</p>

		</div>
		
		<div class="anunt">
           		<p>This is an announce!</p>

		</div>
        <!-- </div> -->
        <div id="center-part">
            <div class="clear"></div>
           
	</div>
</div>

 <script>
        function openPage(evt, cityName) {
    
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
        }
    </script> 
	
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
