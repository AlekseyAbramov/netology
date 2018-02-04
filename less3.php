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
foreach ($a as $continent => $animals) {
    foreach ($animals as $animal) {
        $word_summ = str_word_count($animal);
        if ($word_summ == 2) {
            $new_a[$continent][] = $animal;
            $word = str_word_count($animal, 1);
            $descript[$continent][] = $word[0];
            $title[] = $word[1];
        }
    }
}

echo '<pre>';
print_r($new_a);

$keys = array_keys($descript);
shuffle($keys);
$descript1 = [];
foreach ($keys as $key) {   
    $descript1[$key][] = $descript[$key][0];
    $descript1[$key][] = $descript[$key][1];
}

shuffle($title);

$fantasy_anymals = [];
$n = 0;
foreach ($descript1 as $continent => $animals) {
    foreach ($animals as $animal) {
        $fantasy_anymals[$continent][] = "$animal". " $title[$n]";
        $n = $n + 1;
    }
}

foreach ($fantasy_anymals as $continent => $animals){
    $animal = implode(", ", $animals);
    echo "<h2>". "$continent". "</h2>";
    echo $animal;
}
