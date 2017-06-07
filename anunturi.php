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
				 </p>
            <input type="button" name="details" value="Details" class="button" id="b1">
			<input type="button" name="contact" value="Contact" class="button" id="b2">
			<input type="button" name="report" value="Report" class="button" id="b3">
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

	
</body>

</html>
