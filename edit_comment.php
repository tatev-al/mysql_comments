<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    include "db_config.php";

    $connection = mysqli_connect($servername, $username, $password, $db_name);
    session_start();
    if($connection == false)
    {
        echo 'Connection failed.<br>';
        echo mysqli_connect_error();
        exit();
    }

    $comment_id = $_SESSION['id'];
    $edited_comment = mysqli_real_escape_string($connection, htmlspecialchars($_POST['comment']));
    if(empty($edited_comment))
            {
                exit('Comment is required');
            }
    $result = mysqli_query($connection, "UPDATE `comments` SET `comment` = $edited_comment WHERE `user_id` = $comment_id");
    var_dump($comment_id);
    /*if (!(mysqli_query($connection, $result))) 
    {
        echo "Error: " . $result . "<br>" . mysqli_error($connection);
        exit(); 
    }*/
    
    mysqli_close($connection); 
    //header('Location: comments.php');
}