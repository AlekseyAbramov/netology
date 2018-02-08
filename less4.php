<?php
              
$url = 'http://api.openweathermap.org/data/2.5/weather?q=Yaroslavl,RU&units=metric&APPID=f856e30cf2d2e0f1c7ef6d82b29cd68a';
$time = time() - 3600;
$file = 'weather.json';

if (filemtime($file) < $time){
    $open = file_get_contents($url);
    $current = file_put_contents($file, $open);
}

$weather = file_get_contents($file);
$json = json_decode($weather);
$temp = $json->main->temp;
$pressure = $json->main->pressure;
$humidity = $json->main->humidity;
$speed = $json->wind->speed;

echo "<img src='http://openweathermap.org/img/w/". $json->weather[0]->icon. ".png'>";
echo $json->name."<br> температура ". $temp. "&#176; C";
echo "<br> давление ". 0.75*$pressure. " мм рт. ст.";
echo "<br> влажность ". $humidity. " %";
echo "<br> скорость ветра ". $speed. " м/с";