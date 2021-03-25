<?php
include "weather.php";
get_weather();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Log in</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <form method="POST" action="process_login.php">
        <label>Email: </label> <br>
        <input type="email" name="email" placeholder="Email"> <br>
        <label>Password: </label> <br>
        <input type="password" name="pass" placeholder="Password"> <br>
        <input type="submit" name="done" value="Submit">
        <a href="reg.php">Registration page</a> 
    </form>
</body>

</html>