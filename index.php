<?php
  session_start();
  if(!isset($_SESSION["email"]))
  {
    header('Location: reg.php');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous">
</head>

<body>

  <form method="POST" action="create_comment.php">
    <label>Name: </label> <br>
    <input type="text" name="name" placeholder="Name"> <br>
    <label>Comment: </label> <br>
    <textarea name="comment" cols="40" rows="7"></textarea> <br>
    <input type="submit" name="done" value="Submit">
  </form> 
</body>

</html>