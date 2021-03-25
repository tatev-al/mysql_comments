<?php

session_start();
if(!isset($_SESSION['id']))
{
  header('Location: comments.php');
}

if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']))
{
    require "db_config.php";
    $connection = mysqli_connect($servername, $username, $password, $db_name);
    if($connection == false)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $comment_id = $_GET['id'];
    $result = mysqli_query($connection, "SELECT id, comment FROM comments WHERE comments.id = '$comment_id' AND user_id = ". $_SESSION['id']);
    $record = mysqli_fetch_assoc($result);    
    if (!$record)
    {
        echo "Access denied!" . mysqli_error($connection);
        exit(); 
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <title>Edit comment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

        <body>
            <form method="POST" action="edit_comment.php">
                <label>Edit your comment: </label> <br>
                <input type="hidden" name="id" value="<?= $comment_id ?>">
                <textarea name="comment" cols="40" rows="7"><?= $record['comment']; ?></textarea> <br>
                <input type="submit" name="done" value="Submit">
            </form>
        </body>

    </html>
    
    <?php
}
else
{
    header('Location: comments.php');
}