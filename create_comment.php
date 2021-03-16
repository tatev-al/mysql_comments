<?php

    $connection = mysqli_connect('127.0.0.1','root','','intern');

    if($connection == false)
    {
        echo 'Connection failed.<br>';
        echo mysqli_connect_error();
        exit();
    }
    $login = $_POST['name'];
    $comm = $_POST['comment'];
    $sql = "INSERT INTO `comments` (`id`, `name`, `comment`, `created_at`) VALUES (NULL, '$login', '$comm', current_timestamp())";
   
    if (!(mysqli_query($connection, $sql))) 
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);    
    } 

    mysqli_close($connection); 
    header('Location: /comments.php');
    
?>