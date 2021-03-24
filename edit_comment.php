<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    session_start();
    if(!isset($_SESSION['id']))
    {
        var_dump($_SESSION['id']);exit();
        header('Location: comments.php');
    }
    include "db_config.php";
    $connection = mysqli_connect($servername, $username, $password, $db_name);
  
    if($connection == false)
    {
        echo 'Connection failed.<br>';
        echo mysqli_connect_error();
        exit();
    }
    $comment_id = $_POST['id'];
    $edited_comment = mysqli_real_escape_string($connection, htmlspecialchars($_POST['comment']));
    if(empty($edited_comment))
    {
        exit('Comment is required');
    }
    $result = mysqli_query($connection, "UPDATE comments SET comment = '$edited_comment' WHERE comments.id = '$comment_id' and user_id = " . $_SESSION["id"]);
    
    mysqli_close($connection); 
    header('Location: comments.php');
}