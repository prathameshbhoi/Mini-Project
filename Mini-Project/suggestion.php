
<?php

    include('connection.php');
    session_start();
    error_reporting(0);
    //$value = "SELECT FROM responses where "
    $score = $_SESSION["login"];
    //echo $score;

    if ($score == 2)
    {
      $query = "SELECT * FROM category1";
    }
    elseif ($score == 3)
    {
      $query = "SELECT * FROM category2";
    }
    elseif ($score == 5)
    {
      $query = "SELECT * FROM category3";
    }
    elseif ($score == 6)
    {
      $query = "SELECT * FROM category4";
    }
    elseif ($score == 7)
    {
      $query = "SELECT * FROM category5";
    }
    else {
      $query = "SELECT * FROM table2";
    }

    $result = mysqli_query($conn,$query);


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles2.css">
    <link rel="icon" href="images/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Merienda+One&family=Merriweather:wght@300&family=Sacramento&display=swaps" rel="stylesheet">
    <title>Unwind | Suggestions</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
      function test()
      {
        window.location.href="/feedback.php"
      }
    </script>
  </head>

  <body>
    <center><h2>Here Are Some Suggestions For You!</h2></center>
    <div class="tbl">
      <table class="tables" >
        <t>
          <th>Recommendations </th>
          <th>Links</th>
        </t>
        <?php
        while ($rows=mysqli_fetch_assoc($result))
        {
        ?>
          <tr>
          <td> <?php echo $rows['name']; ?></td>
          <td> <a href= "<?php echo $rows['Link']; ?>"><?php echo $rows['Link']; ?> </a>  </td>
          </tr>
      <?php
        }
      ?>
      </table>
    </div>
    <center>
      <button type="button" class="btn" onclick=" test() " name="button">Done Here!</button>
      <button class="btn" onclick="window.location.href='/more.php';"> You Might Also Like </button>

    </center>
  </body>
</html>
