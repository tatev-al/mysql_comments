<?php
  session_start();
  if(!isset($_SESSION['id']))
  {
    header('Location: reg.php');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Write comment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

  <form method="POST" action="create_comment.php">
    <label>Comment: </label> <br>
    <textarea name="comment" cols="40" rows="7"></textarea> <br>
    <input type="submit" name="done" value="Submit">
    <a href="logout.php">Log out</a> 
  </form> 
</body>

</html>