<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db ='tehnologiiweb' ;
	$to = $_POST['email_to']; 
    $from = $_POST['email']; 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = " Lost&Found Email ! ";
    $subject2 = "Copy of your email: ";
    $message = $first_name . " " . $last_name . " contacted you:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your email: " . $first_name . "\n\n" . $_POST['message'];
    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
	
	$con = new mysqli($servername, $username, $password) or die (mysqli_error());
    $select_db = mysqli_select_db($con,$db) or die ("Connot connect to the database");

    $db = mysqli_query($con, "SELECT * FROM users WHERE email='".$to."'");
    $num_rows = mysqli_num_rows($db);

    if($num_rows != 0)
      {
       while($row = mysqli_fetch_assoc($db))
       {
       $db_email=$row['email'];
       }
	   if($to == $db_email )
       {
       session_start();
       $_SESSION['sess_user']=$to;
           
        if(isset($_POST['submit']))
   {
    
	if (filter_var($to, FILTER_VALIDATE_EMAIL)) {
    mail($to,$subject,$message,$headers);
	echo "Mail Sent. Thank you " . $last_name . "!";
	} else {
    echo("$to is not a valid email address !");
	}
    mail($from,$subject2,$message2,$headers2);
       }
      } 
   } else {echo "The email is not in the database !";}
?>
</br></br>
<a href="index.html">Go back</a>