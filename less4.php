<?php
              
$url1 = 'http://api.openweathermap.org/data/2.5/weather?';
$time = time() - 3600;
$file = 'weather.json';
$q = 'q=Yaroslavl,RU';
$units = 'units=metric';
$appid = 'APPID=f856e30cf2d2e0f1c7ef6d82b29cd68a';
$lang = 'lang=ru';
$url = $url1. $q. '&'. $units. '&'. $lang. '&'. $appid;

if (file_exists($file) && filemtime($file) < $time || !file_exists($file)){
    $open = file_get_contents($url);
    $current = file_put_contents($file, $open);
    $json = json_decode($open);
}
 else {
    $weather = file_get_contents($file);
    $json = json_decode($weather);   
}

$name = $json->name;
$temp = $json->main->temp;
$pressure = $json->main->pressure;
$humidity = $json->main->humidity;
$speed = $json->wind->speed;
$icon = $json->weather[0]->icon;
$description = $json->weather[0]->description;

?>
<table>
    <thead>
    <h1>Погода в <?= $name?></h1>
    <h2><?= date('G:i j.m.Y')?></h2>
    </thead>
    <tr>
        <td><?= $description?></td>
        <td><img src='http://openweathermap.org/img/w/<?= $icon?>.png'></td>
    </tr>
    <tr>
        <td>температура</td>
        <td><?= $temp. "&#176; C"?> </td>
    </tr>
    <tr>
        <td>давление</td>
        <td><?= 0.75*$pressure?> мм рт. ст.</td>
    </tr>
    <tr>
        <td>влажность</td>
        <td><?= $humidity?> %</td>
    </tr>
    <tr>
        <td>скорость ветра</td>
        <td><?= $speed?> м/с</td>
    </tr>
</table>