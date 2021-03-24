<?php

function get_weather()
{
    include "db_config.php";

    $connection = mysqli_connect($servername, $username, $password, $db_name);
    if($connection == false)
    {
        echo 'Connection failed.<br>';
        echo mysqli_connect_error();
        exit();
    }
    date_default_timezone_set("Europe/Samara");

    $result = mysqli_query($connection, "SELECT last_update FROM weather WHERE city = 'Yerevan'");
    $record = mysqli_fetch_assoc($result);

    $time_pass = time() - strtotime($record['last_update']);
    $ch = curl_init("http://api.openweathermap.org/data/2.5/weather?q=yerevan&appid=57ef064259b59ebd3c38b676a83a0a54&units=metric");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $weather_array = json_decode(curl_exec($ch));
    curl_close($ch);
    if($time_pass > 1800)
    {
        $temp = $weather_array->main->temp;
        echo '<hr>temp = ' . $temp . '<hr>';
        $sql_update = mysqli_query($connection, "UPDATE weather SET temperature = $temp, last_update = current_timestamp() WHERE city = 'Yerevan'");
    }
    $sql = mysqli_query($connection, "SELECT city, temperature FROM weather");
    $row = mysqli_fetch_assoc($sql);

    echo 'Temperature in Yerevan: ' . $row['temperature'] . '<hr>';
}
