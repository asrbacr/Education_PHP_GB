<?php

// 1. Реализовать основные 4 арифметические операции в виде функции
// с тремя параметрами – два параметра это числа, третий – операция.
// Обязательно использовать оператор return.

function sum(int $a, int $b): int
{
    return $a + $b;
}

function sub(int $a, int $b): int
{
    return $a - $b;
}

function mul(int $a, int $b): int
{
    return $a * $b;
}

function div(int $a, int $b): float | string
{
    if ($b === 0) {
        return 'На ноль делить нельзя';
    }
    return $a / $b;
}

// 2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
function mathOperation(int $arg1, int $arg2, string $operation): int | float | string
{
    switch ($operation) {
        case '+':
            return sum($arg1, $arg2);
            break;
        case '-':
            return sub($arg1, $arg2);
            break;
        case '*':
            return mul($arg1, $arg2);
            break;
        case '/':
            return div($arg1, $arg2);
            break;
        default:
            return "Функция не реализована";
            break;
    }
}

$sum = mathOperation(2, 3, '+');
echo $sum . PHP_EOL;

$sub = mathOperation(2, 5, '-');
echo $sub . PHP_EOL;

$mul = mathOperation(2, 3, '*');
echo $mul . PHP_EOL;

$div = mathOperation(2, 0, '/');
echo $div . PHP_EOL;

$ostDiv = mathOperation(2, 0, '%');
echo $ostDiv . PHP_EOL;

// 3.  Объявить массив, в котором в качестве ключей будут использоваться названия областей, 
// а в качестве значений – массивы с названиями городов из соответствующей области. 
// Вывести в цикле значения массива, чтобы результат был таким: 
// Московская область: Москва, Зеленоград, Клин 
// Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт 
// Рязанская область … (названия городов можно найти на maps.yandex.ru)
