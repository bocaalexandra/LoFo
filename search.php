<?php
  if(isset($_POST['sb'])){
  if(isset($_GET['go'])){
  if(preg_match("/^[  a-zA-Z]+/", $_POST['stext'])){
  $name=$_POST['stext'];
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db ='tehnologiiweb' ;
  $con = new mysqli($servername, $username, $password) or die (mysqli_error());
  $mydb=mysqli_select_db($con,$db) or die ("Connot connect to the database");
  //-query  the database table
  $sql="SELECT  * FROM lost WHERE nume LIKE '%" . $name .  "%'";
  //-run  the query against the mysql query function
  $db=mysqli_query($con,$sql);
  $num_rows = mysqli_num_rows($db);
  if($num_rows != 0){
  //-create  while loop and loop through result set
   while($row = mysqli_fetch_assoc($db)){
          $id  =$row['id'];
          $nume=$row['nume'];
          $adr=$row['address'];
  //-display the result of the array
  echo "<ul>\n";
  echo "<li>" . "<a  href=\"search.php?id=$id\">"   .$nume . " " . $adr .  "</a></li>\n";
  echo "</ul>";
  }
  }
  $sql2="SELECT  * FROM found WHERE nume LIKE '%" . $name .  "%'";
  $db=mysqli_query($con,$sql2);
  $num_rows2 = mysqli_num_rows($db);
  if($num_rows2 != 0){
  //-create  while loop and loop through result set
   while($row2 = mysqli_fetch_assoc($db)){
          $id2  =$row2['id'];
          $nume2=$row2['nume'];
          $adr2=$row2['address'];
  //-display the result of the array
  echo "<ul>\n";
  echo "<li>" . "<a  href=\"search.php?id=$id2\">"   .$nume2 . " " . $adr2 .  "</a></li>\n";
  echo "</ul>";
  }
  }
  }
  }
  }
?>