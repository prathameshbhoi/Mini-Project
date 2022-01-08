<?php
include 'connection.php';
session_start();
error_reporting(0);

if(isset($_POST['submit']))
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "miniproject";
    $userid = $_SESSION["login"];
    //$userid = $_POST['userid'];
    $relaxed = $_POST['relaxed'];
    $feel = $_POST['feel'];
    $visit = $_POST['visit'];
    $likes = implode(",",$_POST['likes']);
    $future = $_POST['future'];
    $rate = $_POST['rate'];

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query ="INSERT INTO feedback(login,Q1,Q2,Q3,Q4,Q5,Q6) VALUES ('$userid','$relaxed','$feel','$visit','$likes','$future','$rate')" ;

    $result = mysqli_query($conn,$query);

    if($result)
    {
      $message = "Thank you for your feedback!";
      echo "<script type='text/javascript'>alert('$message'); </script>";
      header("Location:thankyou.html");
    }
    else{
      $message = "Failed !";
      echo "<script type='text/javascript'>alert('$message'); </script>";
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
    <title>Unwind | Feedback</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
      function test()
      {
        window.location.href="/thankyou.html"
      }
    </script>
  </head>
  <body>
  <center> <h2>How do you feel now?</h2> </center>
  <div class="feedback">
    <form method="post" action="">

      <div class="input-group">
        <label class="question">1. Did our website help you to feel Relaxed?</label>
        <br>
        <input type="radio" name="relaxed" value="Yes">
        <label for="Yes">Yes, Offcourse!</label><br>

        <input type="radio" name="relaxed" value="some">
        <label for="some">Somewhat, it did!</label><br>

        <input type="radio"  name="relaxed" value="No">
        <label for="No">Not At All!</label><br>
      </div>
      <br>
      <hr>

       <div class="input-group">
         <label class="question">2. How do you Feel now?</label>
         <br>
         <input type="radio" name="feel" value="very Relaxed">
         <label for="very Relaxed">Very Relaxed</label><br>

         <input type="radio" name="feel" value="Relaxed">
         <label for="Relaxed">Relaxed</label><br>

         <input type="radio" name="feel" value="Stressed">
         <label for="Stressed">Stressed</label><br>

         <input type="radio" name="feel" value="Very Stressed">
         <label for="Very Stressed">Very Stressed</label><br>
       </div>

       <br>

       <div class="input-group">
         <label class="question">3. How offten do you visit website?</label>
         <br>
         <input type="radio" name="visit" value="Everyday">
         <label for="Everyday">Everyday</label><br>

         <input type="radio" name="visit" value="week">
         <label for="week">More than twice in a week</label><br>

         <input type="radio" name="visit" value="week">
         <label for="week">Once in a week or less</label><br>
       </div>
       <br>
       <hr>

       <div class="input-group">
         <label class="question">4. What did you like the most?</label>
         <br>
         <input type="checkbox"  name="likes[]" value="songs">
         <label for="songs">Songs</label><br>

         <input type="checkbox"  name="likes[]" value="Videos">
         <label for="Videos">Videos</label><br>

         <input type="checkbox"  name="likes[]" value="Exercises">
         <label for="Exercises">Exercises</label><br>

         <input type="checkbox"  name="likes[]" value="Meditation Videos">
         <label for="Meditation Videos">Meditation Videos</label><br>

         <input type="checkbox"  name="likes[]" value="tips">
         <label for="tips">Tips to deal with Mental Issues.</label><br>
       <br>
       <hr>

       <div class="input-group">
         <label class="question">5. Would you use our website in future?</label>
         <br>
         <input type="radio" name="future" value="Definitely">
         <label for="Definitely">Definitely</label><br>

         <input type="radio"  name="future" value="Probably">
         <label for="Probably">Probably</label><br>

         <input type="radio"  name="future" value="Not Sure">
         <label for="Not Sure">Not Sure</label><br>

         <input type="radio" name="future" value="Never">
         <label for="Never">Never</label><br>
       </div>
        <br>
        <hr>
        <div class="input-group">
        <label class="question">6. What will you rate us?</label>
        <br>
        <input type="radio" name="rate" value="5">
        <label for="5">5</label>
        <input type="radio" name="rate" value="4">
        <label for="4">4</label>
        <input type="radio" name="rate" value="3">
        <label for="3">3</label>
        <input type="radio" name="rate" value="2">
        <label for="2">2</label>
        <input type="radio" name="rate" value="1">
        <label for="1">1</label>
        </div>
      <br>

       <div class="input-group">
         <center><button type="submit" onclick="test()" class="btn" name="submit">Send</button></center>
       </div>
     </form>
  </div>
  </body>
</html>
