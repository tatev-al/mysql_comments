<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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