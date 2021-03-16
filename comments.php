<?php

$connection = mysqli_connect('127.0.0.1','root','','intern');

if($connection == false)
{
    echo 'Connection failed.<br>';
    echo mysqli_connect_error();
    exit();
}

$result = mysqli_query($connection, "SELECT * FROM `comments`");

while(($record = mysqli_fetch_assoc($result)))
{   
    echo 'Name: ';
    print_r($record['name']);
    echo '<br> Comment: ';
    print_r($record['comment']);
    echo '<hr>';
}
mysqli_close($connection); 

?>