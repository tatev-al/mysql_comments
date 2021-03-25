<?php

function get_weather()
{
    require "db_config.php";

    $connection = mysqli_connect($servername, $username, $password, $db_name);
    if($connection == false)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    date_default_timezone_set("Europe/Samara");

    $result = mysqli_query($connection, "SELECT city, temperature, last_update FROM weather WHERE city = 'Yerevan'");

    if(mysqli_num_rows($result) == 0)
    {
        $temperature = get_temperature();
        mysqli_query($connection, "INSERT INTO weather (city, temperature) VALUES ('Yerevan', $temperature)");
    }
    $record = mysqli_fetch_assoc($result);
    $time_pass = time() - strtotime($record['last_update']);
    if($time_pass > 1800)
    {
        $temperature = get_temperature();
        mysqli_query($connection, "UPDATE weather SET temperature = $temperature, last_update = current_timestamp() WHERE city = 'Yerevan'");   
    }
    echo 'Temperature in Yerevan: ' . $record['temperature'] . '<hr>';
}

function get_temperature()
{
    $ch = curl_init("http://api.openweathermap.org/data/2.5/weather?q=yerevan&appid=57ef064259b59ebd3c38b676a83a0a54&units=metric");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $weather_array = json_decode(curl_exec($ch));
    curl_close($ch);
    return $weather_array->main->temp;
}
