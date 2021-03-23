<?php

session_start();
if(!isset($_SESSION['id']))
{
  header('Location: comments.php');
}

if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']))
{
    include "db_config.php";
    $connection = mysqli_connect($servername, $username, $password, $db_name);
    if($connection == false)
    {
        echo 'Connection failed.<br>';
        echo mysqli_connect_error();
        exit();
    }
    if(!isset($_GET['id']))
    {
        header('Location: login.php');
    }
    $comment_id = $_GET['id'];
    $result = mysqli_query($connection, "SELECT `comment` FROM `comments` WHERE comments.id = $comment_id AND user_id = ". $_SESSION['id']);
    $record = mysqli_fetch_assoc($result);    
    if (!$record)
    {
        echo "Access denied!" . mysqli_error($connection);
        exit(); 
    }
    ?>

    <form method="POST" action="edit_comment.php">
        <label>Comment: </label> <br>
        <textarea name="comment" cols="40" rows="7"><?= $record['comment']; ?></textarea> <br>
        <input type="submit" name="done" value="Submit">
    </form>
    
    <?php
}
else
{
    header('Location: comments.php');
}