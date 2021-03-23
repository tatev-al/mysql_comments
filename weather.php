<?php

use function PHPSTORM_META\type;

$ch = curl_init("http://api.openweathermap.org/data/2.5/weather?q=Yerevan&appid=9638c0cc9efbbfc00e4493a1effc4199&units=metric");

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$weather_array = json_decode(curl_exec($ch));
//echo "temperature: $weather_array['main']['temp']";
echo 'Temperature in Yerevan: ' . $weather_array->main->temp . '<hr>';
curl_close($ch);