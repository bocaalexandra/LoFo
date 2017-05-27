<?php


 $servername = "localhost";
 $username = "root";
 $password = "lostnfound";
 $db ='tehnologiiweb' ;

 $con = mysql_connect($servername, $username, $password);
 $select_db = mysql_select_db($db);

 if(isset($_POST['fname']) && isset($_POST['lname']) && isset( $_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset( $_POST['phone']))
      {
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $phone = $_POST['phone'];
      $usercheck=$email;
      $usercheck="SELECT * FROM users WHERE email = $usercheck";
      $result=mysql_query($usercheck,$con);
      $yes=count($result);
      echo $email;

      if($yes >0)
      {
       header("refresh:3; url=index.html");
      }
      else
      {

  $query = "INSERT INTO users (fname, lname, username, email, password, phone) VALUES ('$fname', '$lname', '$username', '$email', '$password', '$phone')";
  $check= mysql_query($query, $con);
  if($check)
  die ('Error');
  else
  echo "bla bla";

}
}


 ?>