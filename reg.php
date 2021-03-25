<?php
include "weather.php";
get_weather();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <form method="POST" action="create_user.php">
        <label>Name: </label> <br>
        <input type="text" name="name" placeholder="Name"> <br>
        <label>Email: </label> <br>
        <input type="email" name="email" placeholder="Email"> <br>
        <label>Password: </label> <br>
        <input type="password" name="pass" placeholder="Password"> <br>
        <input type="submit" name="done" value="Submit">
        <a href="login.php">Log in</a> 
    </form>
</body>

</html>