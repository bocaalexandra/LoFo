<?php

if(isset($_POST["submit"]))
{
  if(!empty($_POST['usernameus']) && !empty($_POST['passwordus']))
  {

    $usernameus = $_POST['usernameus'];
    $passwordus = $_POST['passwordus'];



   $servername = "localhost";
   $username = "root";
   $password = "lostnfound";
   $db ='tehnologiiweb' ;

    $con = new mysqli($servername, $username, $password) or die (mysqli_error());
    $select_db = mysqli_select_db($con,$db) or die ("Connot connect to the database");

    $db = mysqli_query($con, "SELECT * FROM users WHERE passwordus='".$passwordus."' AND usernameus='".$usernameus."'");
    $num_rows = mysqli_num_rows($db);

    if($num_rows != 0)
      {
       while($row = mysqli_fetch_assoc($db))
       {
       $databaseusername=$row['usernameus'];
       $databasepassword=$row['passwordus'];
       }
       if($usernameus == $databaseusername && $passwordus == $databasepassword)
       {
       session_start();
       $_SESSION['sess_user']=$usernameus;
           ?>
                      <script>alert('Welcome!');</script>
           <?php

       header("refresh:1; url=index_logout.html");
       }
       }
       else
       {
        ?>
              <script>alert('Invalid Username or Password! Please try again');</script>
        <?php

        header("refresh:1; url=login.html");
       }
       }
       else
       {
         ?>
               <script>alert('All fields are required!');</script>
         <?php

         header("refresh:1; url=login.html");
       }
      }

?>

