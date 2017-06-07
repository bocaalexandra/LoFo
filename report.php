<?php 
if(isset($_POST['submit2']))
   {
    $to = "boca_alexandra96@yahoo.com";  
    $subject = " Lost&Found Email Report ! ";
	$radio = $_POST['group1'];
    $message2 = "Reason: \n" . $radio . "\n" . $_POST['message2'];
    $headers = "From:(de completat)" ;
    mail($to,$subject,$message2,$headers);
    echo "Report submited succesfully !. Thank you, we'll take care of that as fast as we can. ";
    }
?>
</br></br>
<a href="index.html">Go back</a>