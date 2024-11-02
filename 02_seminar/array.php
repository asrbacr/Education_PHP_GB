<?php

/* $x = [
    1, 
    2, 
    3,
    'name' => 'Vasya',
    'number' => 1,
];

// echo $x[2];
$x[] = 4;
$x[2] = null;
$x[78] = 5;
$x["ключ"] = 6;
unset($x[4]);

print_r($x);

// for ($i=0; $i < count($x); $i++) { 
//     echo $x[$i];    
// }

foreach ($x as $key => $value) {
    echo $value . PHP_EOL;
} */

$users = [
    [
        'name' => 'Вася',
        'age' => 18,
        'gender' => 'male',
        'hobbies' => [
            'футбол',
            'плавание',
        ],
    ],
    [
        'name' => 'Петя',
        'age' => 19,
        'gender' => 'male',
        'hobbies' => [
            'футбол',
            'плавание',
        ],
    ],
    [
        'name' => 'Маша',
        'age' => 20,
        'gender' => 'female',
        'hobbies' => [
            'футбол',
            'плавание',
        ],
    ],
];

foreach ($users as $user) {
    echo $user['name'] . PHP_EOL;
};