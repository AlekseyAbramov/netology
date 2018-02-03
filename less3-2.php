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
foreach ($a as $continent => $animals) {
    foreach ($animals as $animal) {
        $word_summ = str_word_count($animal);
        if ($word_summ == 2) {
            $new_a[] = "$continent". " $animal";
        }
    }
}
echo '<pre>';
print_r($new_a);
foreach ($new_a as $v) {
    $word = str_word_count($v, 1);
    if (count($word) == 3) {
    $descript[] = "$word[0]". " $word[1]";
    $title[] = $word[2];}
 else {
    $descript[] = "$word[0]". " $word[1]". " $word[2]" ;
    $title[] = $word[3];}   
}
shuffle($descript);
shuffle($title);
for ($i = 0; $i<count($title); $i++) {
    $fantasy[] = $descript[$i]. " $title[$i]";
    $word = str_word_count($fantasy[$i], 1);
    if (count($word) == 3) {
        $fantasy_anymals["$word[0]"][] = "$word[1]". " $word[2]";
    }
    else { 
       $fantasy_anymals["$word[0]". " $word[1]"][] = "$word[2]". " $word[3]";
    }
}
foreach ($fantasy_anymals as $continent => $animals){
    echo "<h2>". "$continent". "</h2>";
    foreach ($animals as $animal) {
        echo " $animal,";
    }
}