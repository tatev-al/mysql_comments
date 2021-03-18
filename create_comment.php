<?php

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {

        $connection = mysqli_connect('127.0.0.1','root','','intern');

        if($connection == false)
        {
            echo 'Connection failed.<br>';
            echo mysqli_connect_error();
            exit();
        }
        $name = mysqli_real_escape_string($connection, htmlspecialchars($_POST['name']));
        $comm = $_POST['comment'];
        if(empty($name))
        {
            exit('Name is required');
        }
        if(empty($comm))
        {
            exit('Comment is required');
        }
        $sql = "INSERT INTO `comments` (`name`, `comment`) VALUES ('$name', '$comm')";
    
        if (!(mysqli_query($connection, $sql))) 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);    
        } 

        mysqli_close($connection); 
        header('Location: comments.php');
    }
    
?>