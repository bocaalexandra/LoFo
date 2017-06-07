<?php 
if(isset($_POST['submit']))
   {
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
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2);
    echo "Mail Sent. Thank you " . $last_name . "!";
    }
?>
</br></br>
<a href="index.html">Go back</a>