<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous">
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