<?php

if(isset($_POST["submit"]))
{
  if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['usernameus']) && !empty($_POST['email']) && !empty($_POST['passwordus']) && !empty($_POST['phone']) && !empty($_POST['gender']))
  {

   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $usernameus = $_POST['usernameus'];
   $email = $_POST['email'];
   $passwordus = $_POST['passwordus'];
   $phone = $_POST['phone'];
   $gender = $_POST['gender'];



   $servername = "localhost";
   $username = "root";
   $password = "lostnfound";
   $db ='tehnologiiweb' ;

    $con = new mysqli($servername, $username, $password) or die (mysqli_error());
    $select_db = mysqli_select_db($con,$db) or die ("Connot connect to the database");

    $db = mysqli_query($con, "SELECT * FROM users WHERE email='".$email."' OR usernameus='".$usernameus."'");
    $num_rows = mysqli_num_rows($db);

    if($num_rows == 0)
      {
       $sql = "INSERT INTO users (fname, lname, usernameus, email, passwordus, phone, gender) VALUES ('$fname', '$lname', '$usernameus', '$email', '$passwordus', '$phone', '$gender')";
       $result = mysqli_query($con, $sql);
       if($result)
      {
        ?>
           <script type="text/javascript">
           alert('Your account has been created successfully! Please check your E-mail vor validation!');
           </script>
        <?php

        header("refresh:1; url=login.html");
      }
         else
         {
           ?>
                  <script>alert('Failure! Please try again!');</script>
           <?php

        header("refresh:1; url=inregistrare.html");
         }
      }
     else
      {
        ?>
           <script>alert('This E-mail or Username already exists! Please try again');</script>
        <?php

        header("refresh:1; url=inregistrare.html");
      }
      }
     else
     {
     ?>
       <script>alert('All fields are required!');</script>
     <?php

     header("refresh:1; url=inregistrare.html");
     }
     }


?>