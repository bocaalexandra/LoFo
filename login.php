
<?php

  if(isset($_POST["submit1"]))
  {

  $pwd = md5($_POST["password"]);
  $servername = "localhost";
  $username = "root";
  $password = "lostnfound";
 
  $dbhandle = mysqli_connect($servername, $username, $password);
  mysqli_select_db($dbhandle, "tehnologiiweb");

  $count = 0;
  
  $query = mysqli_query($dbhandle, "SELECT * FROM users WHERE username = '$_POST[username]' AND password='pwd'");
  $count = mysqli_num_rows($query);
  
  if($count > 0)
  {
  ?>
  <script type = "text/javascript">
  window.location = "index.html";
  </script>
  <?php
  }
  else
  {
  ?>
    <script type = "text/javascript">
    alert = ("Incorect username or password");
    </script>
  <?php
  }
  }

  header("refresh:3; url=index_logout.html");
  
?>



  
