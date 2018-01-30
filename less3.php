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
//echo '<pre>';
//print_r($animals);
$new_a = [
    
];
foreach ($a as $continent => $animals) {
    $imploded = implode(',', $animals);
    $exploded = explode(',', $imploded);
    foreach ($exploded as $animal) {
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
        echo '<h2>'. "$word[0]". '</h2>';
        echo "$word[1]". " $word[2],";
    }
    else {
       echo '<h2>'. "$word[0]". " $word[1]". '</h2>';
       echo "$word[2]". " $word[3],"; 
    }
}
