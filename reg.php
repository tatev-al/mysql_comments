<?php

//user can login
//then he can add comment
//user without sign in can read comments

//make pages for login and registration
//reg: name, email, password (in reg.php) check if there already exists user with such email (print "exist") and then allow registration
//insert it (create_user.php)
//if registration is succesfull header('Location: login.php')

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous">
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
    </form>

</body>

</html>