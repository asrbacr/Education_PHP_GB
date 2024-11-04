<?php

// В функцию передается строка скобок. Например:
// "()()(())"
// Надо на выходе показать, корректна ли последовательность.
// Некорректные последовательности:
// ")("
// "())("

$str = "()()(())";
$str2 = "())(";

// echo strlen($str);

echo validate_string($str) ? "Строка валидна" : "Ошибка в строке";
echo validate_string($str2) ? "Строка валидна" : "Ошибка в строке";

function validate_string(string $str):bool {
    $count = 0;
    for ($i=0; $i < strlen($str); $i++) {
        if($str[$i] == "(") {
            $count++;
        } else if ($str[$i] === ")"){
            $count--;
        }
        if($count < 0) {
            return false;
        }
    }
    return $count === 0;
}

