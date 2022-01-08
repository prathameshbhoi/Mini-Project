<?php

include 'connection.php';
session_start();
error_reporting(0);

if (isset($_POST['submit']))
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "miniproject";
    $userid = $_SESSION["login"];
    //$userid1 = $userid - 1000;
    $myVariable = " Prathamesh ";

    $que1 = $_POST['q1'];
    $que2 = $_POST['q2'];
    $que3 = $_POST['q3'];
    $que4 = $_POST['q4'];
    $que5 = $_POST['q5'];
    $que6 = $_POST['q6'];
    $que7 = $_POST['q7'];
    $que8 = $_POST['q8'];
    $que9 = $_POST['q9'];
    $que10 = $_POST['q10'];
    $data3= $que1.$que2.$que3.$que4.$que5.$que6.$que7.$que8.$que9.$que10;

    $output=shell_exec("python test.py "  .$data3);
    //echo $output;
    $value= $output;
    echo $value;
    echo $userid;
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $query = "INSERT INTO responses (login,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10,score) VALUES ('$userid','$que1','$que2','$que3','$que4','$que5','$que6','$que7','$que8','$que9','$que10','$value') ";
    //$query2 = "INSERT INTO responses (total) VALUES('$value') ";
    $result = mysqli_query($conn,$query);

    $_SESSION["login"] = $value;
    //$output=shell_exec("python test.py "  .$data3);
    //echo $output;

    if($result)
    {
      $message = "Your record is inserted!";
      echo "<script type='text/javascript'>alert('$message');</script>";
      header("Location:suggestion.php");
    }
    else{
      $message = "Failed to insert!";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }

    mysqli_free_result($result);
    mysqli_close($conn);
      //mysqli_query($query) or die (mysqli_connect_error());
      //$i++;
      // code...
    }
    //echo "Sussess";
//}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles2.css">
    <link rel="icon" href="images/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Merienda+One&family=Merriweather:wght@300&family=Sacramento&display=swaps" rel="stylesheet">

    <title>Unwind | Quetionnaire</title>
  </head>
  <body>
    <center><h2>Help Us To Understand Your Mood!</h2></center>
    <div class="quetions">
      <form method="post" action="questions.php">
         <div class="input-group">
           <label class="question"> Answer these questions on a scale of 1 to 5, where 5 is for strongly agree and 1 for strongly disagree</label><br><br>
           <hr>
           <label class="question">1. I am sleep deprived </label>
           <br>
           <input type="radio" name="q1" value="5">
           <label for="5">5</label>
           <input type="radio" name="q1" value="4">
           <label for="4">4</label>
           <input type="radio" name="q1" value="3">
           <label for="3">3</label>
           <input type="radio" name="q1" value="2">
           <label for="2">2</label>
           <input type="radio" name="q1" value="1">
           <label for="1">1</label>
         </div>
         <br>
         <div class="input-group">
           <label class="question">2. My appetite has changed </label>
           <br>
           <input type="radio" name="q2" value="5">
           <label for="5">5</label>
           <input type="radio" name="q2" value="4">
           <label for="4">4</label>
           <input type="radio" name="q2" value="3">
           <label for="3">3</label>
           <input type="radio" name="q2" value="2">
           <label for="2">2</label>
           <input type="radio" name="q2" value="1">
           <label for="1">1</label>
         </div>
         <br>
          <div class="input-group">
           <label class="question">3. I feel very tired and lethargic </label>
           <br>
           <input type="radio" name="q3" value="5">
           <label for="5">5</label>
           <input type="radio" name="q3" value="4">
           <label for="4">4</label>
           <input type="radio" name="q3" value="3">
           <label for="3">3</label>
           <input type="radio" name="q3" value="2">
           <label for="2">2</label>
           <input type="radio" name="q3" value="1">
           <label for="1">1</label>
         </div>
         <br>
         <div class="input-group">
           <label class="question">4. When I am interrupted at an activity, I respond with anger</label>
           <br>
           <input type="radio" name="q4" value="5">
           <label for="5">5</label>
           <input type="radio" name="q4" value="4">
           <label for="4">4</label>
           <input type="radio" name="q4" value="3">
           <label for="3">3</label>
           <input type="radio" name="q4" value="2">
           <label for="2">2</label>
           <input type="radio" name="q4" value="1">
           <label for="1">1</label>
       </div>
       <br>
         <div class="input-group">
           <label class="question">5. I often feel like crying and irritable </label>
           <br>
           <input type="radio" name="q5" value="5">
           <label for="5">5</label>
           <input type="radio" name="q5" value="4">
           <label for="4">4</label>
           <input type="radio" name="q5" value="3">
           <label for="3">3</label>
           <input type="radio" name="q5" value="2">
           <label for="2">2</label>
           <input type="radio" name="q5" value="1">
           <label for="1">1</label>
       </div>
        <br>
       <div class="input-group">
         <label class="question">6. I do not get much time to tend to personal needs</label>
         <br>
         <input type="radio" name="q6" value="5">
         <label for="5">5</label>
         <input type="radio" name="q6" value="4">
         <label for="4">4</label>
         <input type="radio" name="q6" value="3">
         <label for="3">3</label>
         <input type="radio" name="q6" value="2">
         <label for="2">2</label>
         <input type="radio" name="q6" value="1">
         <label for="1">1</label>
      </div>
      <br>
      <div class="input-group">
        <label class="question">7. I spend plenty of time occupied in my profession</label>
        <br>
        <input type="radio" name="q7" value="5">
        <label for="5">5</label>
        <input type="radio" name="q7" value="4">
        <label for="4">4</label>
        <input type="radio" name="q7" value="3">
        <label for="3">3</label>
        <input type="radio" name="q7" value="2">
        <label for="2">2</label>
        <input type="radio" name="q7" value="1">
        <label for="1">1</label>
      </div>
      <br>
      <div class="input-group">
        <label class="question">8. I am unable to implement my daily goals </label>
        <br>
        <input type="radio" name="q8" value="5">
        <label for="5">5</label>
        <input type="radio" name="q8" value="4">
        <label for="4">4</label>
        <input type="radio" name="q8" value="3">
        <label for="3">3</label>
        <input type="radio" name="q8" value="2">
        <label for="2">2</label>
        <input type="radio" name="q8" value="1">
        <label for="1">1</label>
      </div>
      <br>
      <div class="input-group">
        <label class="question">9. My self-esteem is lower than I would like it to be</label>
        <br>
        <input type="radio" name="q9" value="5">
        <label for="5">5</label>
        <input type="radio" name="q9" value="4">
        <label for="4">4</label>
        <input type="radio" name="q9" value="3">
        <label for="3">3</label>
        <input type="radio" name="q9" value="2">
        <label for="2">2</label>
        <input type="radio" name="q9" value="1">
        <label for="1">1</label>
      </div>
      <br>
        <div class="input-group">
        <label class="question">10. I deny or ignore problems in the hope that they will go away</label>
        <br>
        <input type="radio" name="q10" value="5">
        <label for="5">5</label>
        <input type="radio" name="q10" value="4">
        <label for="4">4</label>
        <input type="radio" name="q10" value="3">
        <label for="3">3</label>
        <input type="radio" name="q10" value="2">
        <label for="2">2</label>
        <input type="radio" name="q10" value="1">
        <label for="1">1</label>
        </div>
      <br>
      <hr>
         <div class="input-group">
           <center><button type="submit" class="btn" name="submit">Submit</button></center>
         </div>
       </form>
    </div>

    </body>
  </html>
