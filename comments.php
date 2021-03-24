<?php
include "weather.php";
get_weather();
include "db_config.php";

$connection = mysqli_connect($servername, $username, $password, $db_name);
session_start();
if($connection == false)
{
    echo 'Connection failed.<br>';
    echo mysqli_connect_error();
    exit();
}

$result = mysqli_query($connection, "SELECT users.name,comments.comment,comments.created_at ,comments.user_id,comments.id FROM users 
                                        INNER JOIN comments ON users.id = comments.user_id ORDER BY created_at");

if(isset($_SESSION['id']))
{
    $session_id = $_SESSION['id'];
    if(mysqli_query($connection, "SELECT `name` FROM users WHERE users.id = $session_id"))
    {
        while(($record = mysqli_fetch_assoc($result)))
        {
            echo 'Name: ' . $record['name'] . '<br> Comment: ' . $record['comment'] . '<br>Date of creation: ' . $record['created_at'];
            if(isset($_SESSION['id']) && $record['user_id'] == $_SESSION['id'])
            {
                echo '<br><a href="edit.php?id=' . $record['id'] . '">EDIT</a>';
            }
            echo '<hr>';
        }
    }
}
else
{
    while(($record = mysqli_fetch_assoc($result)))
    {
        echo 'Name: ' . $record['name'] . '<br> Comment: ' . $record['comment'] . '<br>Date of creation: ' . $record['created_at'] . '<hr>';
    }
}

mysqli_close($connection); 
