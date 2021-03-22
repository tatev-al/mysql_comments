<?php

include "db_config.php";

$connection = mysqli_connect($servername, $username, $password, $db_name);
session_start();
if($connection == false)
{
    echo 'Connection failed.<br>';
    echo mysqli_connect_error();
    exit();
}

$result = mysqli_query($connection, "SELECT comments.*, users.name 
                                        FROM comments JOIN users ORDER BY created_at");
$session_id = $_SESSION['id'];
if(mysqli_query($connection, "SELECT `name` FROM users WHERE users.id = $session_id"))
{
    while(($record = mysqli_fetch_assoc($result)))
    {   
        echo 'Name: ' . $record['name'] . '<br> Comment: ' . $record['comment'];
        if(isset($_SESSION['id']) && $record['user_id'] == $_SESSION['id'])
        {
            echo '<br><a href="edit.php?id=' . $record["user_id"] . '">EDIT</a>';
        }
        echo '<hr>';
    }
}

mysqli_close($connection); 

//ORDER BY CREATED DATE
?>