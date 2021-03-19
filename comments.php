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

$result = mysqli_query($connection, "SELECT * FROM comments");
$session_id = $_SESSION['id'];
$name = mysqli_query($connection, "SELECT `name` FROM users WHERE users.id = $session_id");

while(($record = mysqli_fetch_assoc($result)))
{   
    //echo 'Name: ';
    //print_r($record['name']);
//    echo "Name: $name";
    echo '<br> Comment: ';
    print_r($record['comment']);
    echo '<hr>';
}
mysqli_close($connection); 

?>