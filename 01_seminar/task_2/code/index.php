<?php

$name = "Админ";
var_dump($name);
$name = 1;
var_dump($name);
var_dump([1, 2, 3]);

echo "далее код к ДЗ";

$a = 5;
$b = '05';

# результат в php 8.2
## результат в php 7.4

# true
## true
var_dump($a == $b);


# 12345
## 12345
var_dump((int)'012345');


# false
## false
var_dump((float)123.0 === (int)123.0);

# false
## true
var_dump(0 == 'hello, world');

