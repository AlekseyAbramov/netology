<?php

$a = [
    'Africa' => [
        'Intrepid Ibex',
        'Jackalope',
        'Karmic Koala',
    ],
    'Eurasia' => [
        'Lucid Lynx',
        'Maverick Meerkat',
        'Narwhal',
    ],
    'North America' => [
        'Oneiric Ocelot',
        'Precise Pangolin',
        'Quetzal',
    ],
    'South America' => [
        'Raring Ringtail',
        'Salamander',
        'Trusty Tahr',
    ],
    'Antarctica' => [
        'Unicorn',
        'Vivid Vervet',
        'Wily Werewolf',
    ],
    'Australia' => [
        'Xerus',
        'Yakkety Yak',
        'Zesty Zapus',
    ]
];
$new_a = [];
$descript = [];
$title = [];
$i = 0;
foreach ($a as $continent => $animals) {
    foreach ($animals as $animal) {
        $word_summ = str_word_count($animal);
        if ($word_summ == 2) {
            $new_a["$continent"." $i"] = " $animal";
            $word = str_word_count($animal, 1);
            $descript["$continent"." $i"] = "$word[0]";
            $title[] = $word[1];
            $i = $i + 1;
        }
    }
}

echo '<pre>';
print_r($new_a);

$keys = array_keys($descript);
shuffle($keys);
foreach ($keys as $key) {
    $descript1[$key] = $descript[$key];
}
shuffle($title);

$fantasy_anymals = [];
$n = 0;
foreach ($descript1 as $continent => $animal) {
   $cont = explode(' ', $continent);
   if (count($cont) == 3) {
       $fantasy_anymals["$cont[0]"." $cont[1]"][] = "$animal". " $title[$n]";
   }
 else {
       $fantasy_anymals[$cont[0]][] = "$animal". " $title[$n]";
   }
   $n = $n + 1;
}

foreach ($fantasy_anymals as $continent => $animals){
    echo "<h2>". "$continent". "</h2>";
    for ($i = 0; $i < count($animals)-1; $i++) {
        echo "$animals[$i],";
    }
    echo "$animals[$i]";
}
