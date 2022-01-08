<?php
// Start Session
session_start();
// Get data from the users
if(isset($_POST["login"]) && isset($_POST["userid"]) && isset($_POST["password"]) )
{
$userid = $_POST["userid"];
$password1 = $_POST["password"];

$_SESSION["login"] = $userid;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miniproject";
$message=" ";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}

$sql="SELECT * FROM login WHERE login='$userid' AND password='$password1';";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
print_r($row);
//row [username,password ,usertype]
if (is_array($row)) {
 $_SESSION['username'] = $row['login'];
 echo $_SESSION['username'];

 if ((isset($_SESSION['username'])) ) {
 echo "Success";
 header("Location:questions.php");
}

}
else {
 $message = "Invalid Username or Password!";
 echo "<script type='text/javascript'>alert('$message');</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Merienda+One&family=Merriweather:wght@300&family=Sacramento&display=swaps" rel="stylesheet">

    <title>Unwind </title>

    <style>
    body{
      background-image: url("images/m2.jpg");
      height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size:cover;

    }
    </style>
  </head>
  <body>
    <div class="">
      <center>
        <div class="title">
          <h2><em>Unwind </em></h2>
          <p>The Path Towords Stress-free Life!!</p>

        </div>
        <div class="signin">
         <form method="post" action="">
            <div class="input-group">
              <label>User ID</label>
              <input type="text" name="userid" placeholder="Enter User ID">
            </div>
            <div class="input-group">
              <label>Password</label>
              <input type="password" name="password" placeholder="Enter Password">
            </div>
            <div class="input-group">
              <center><button type="Sigh-in" class="btn" name="login">Login</button></center>
            </div>
            <p>
              Create new account <a href="register.php">Sign up</a>
            </p>
          </form>
        </div>
        </center>

    </div>

  </body>
</html>
