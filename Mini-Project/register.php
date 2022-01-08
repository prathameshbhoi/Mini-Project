<?php
include 'connection.php';
error_reporting(0);

if(isset($_POST['submit']))
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "miniproject";

    $userid = $_POST['userid'];
    $password1 = $_POST['password'];

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query ="INSERT INTO login ( login,password) VALUES ('$userid','$password1')" ;

    $result = mysqli_query($conn,$query);

    if($result)
    {
      $message = "You Have Been Registered Successfully. Welcome To Unwind!! \n You Can Login Using Your User-ID and Password Now!";
      echo "<script type='text/javascript'>alert('$message');</script>";
        //echo 'You Have Been Registered Successfully. Welcome To Unwind!!';
        //echo 'You Can Login Using Your User-ID and Password Now!!';
        //header("Location:index.php");
    }
    else{
      $message = "Registration failed! Try another login-id and password!";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }

    mysqli_free_result($result);
    mysqli_close($conn);

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles2.css">
    <link rel="icon" href="images/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Merienda+One&family=Merriweather:wght@300&family=Sacramento&display=swaps" rel="stylesheet">

    <title>Unwind | Registration Page</title>
  </head>
  <body>
    <center><h2>Registration Page</h2></center>
    <div class="register">
     <form method="post" action="register.php">
        <div class="input-group">
          <label>User ID</label><br>
          <input type="text" name="userid">
        </div>
        <br>
        <div class="input-group">
          <label>Password</label><br>
          <input type="password" name="password">
        </div>
        <div class="input-group">
          <center><button type="submit" class="btn" name="submit">Register</button></center>
        </div>
      </form>
    </div>

  </body>
</html>
