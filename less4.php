<?php
              
$url = 'http://api.openweathermap.org/data/2.5/weather?q=Yaroslavl,RU&units=metric&APPID=f856e30cf2d2e0f1c7ef6d82b29cd68a';
$open = file_get_contents($url);
$json = json_decode($open);

echo "<img src='http://openweathermap.org/img/w/". $json->weather[0]->icon. ".png'>";
echo $json->name."<br> температура ". $json->main->temp. "&#176; C";
echo "<br> давление ". 0.75*$json->main->pressure. " мм рт. ст.";
echo "<br> влажность ". $json->main->humidity. " %";
echo "<br> скорость ветра ". $json->wind->speed. " м/с";