<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header('Location: reg.php');
    }

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
        $comm = mysqli_real_escape_string($connection, htmlspecialchars($_POST['comment']));
        if(empty($comm))
        {
            exit('Comment is required');
        }
        $current_id = $_SESSION['id'];
        $sql = "INSERT INTO `comments` (`user_id`, `comment`) VALUES ('$current_id', '$comm')";
        if (!(mysqli_query($connection, $sql))) 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            exit(); 
        } 

        mysqli_close($connection); 
        header('Location: comments.php');
    }
    
?>