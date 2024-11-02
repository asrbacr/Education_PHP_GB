<?php

/* Даны два упорядоченных массива, например,
[1, 4, 6, 6, 8]
[2, 5, 7, 9]

Нужно написать логику, которая сольёт массивы в один упорядоченный по
возрастанию значений
[1, 2, 4, 5, 6, 6, 7, 8, 9] */

$array1 = [1, 4, 6, 6, 8];
$array2 = [2, 5, 7, 9];

$arrayAll = [];
/* for ($i=0; $i < count($array1); $i++) { 
    for ($j=0; $j < count($array2); $j++) { 
        if ($array1[$i] > $array2[$j]) {
            // $arrayAll[] = "$array2[$j] из 2";
            $arrayAll[] = array_pop($array2);
        } 
        // 
    }
    // $arrayAll[] = "$array1[$i] из 1";
    $arrayAll[] = array_pop($array1);
} */

/* while (count($array1) > 0 && count($array2) > 0) {
    if ($array1[0] < $array2[0]) {
        $arrayAll[] = array_shift($array1);
    } else {
        $arrayAll[] = array_shift($array2);
    }
} */

$count1 = 0;
$count2 = 0;

while ($count1 < count($array1) && $count2 < count($array2)) {
    if ($array1[$count1] < $array2[$count2]) {
        $arrayAll[] = $array1[$count1];
        $count1++;
    } else {
        $arrayAll[] = $array2[$count2];
        $count2++;
    }
}

if ($count1 < count($array1)) {
    for (; $count1 < count($array1); $count1++) { 
        $arrayAll[] = $array1[$count1];
    }
}

if ($count2 < count($array2)) {
    for (; $count2 < count($array2); $count2++) { 
        $arrayAll[] = $array2[$count2];
    }
}

// этот тэг отрисует красиво элементы в браузере
// echo "<pre>";
print_r($arrayAll);

 