<?php

$i = 0;

// это под капотом цикл while
start:
if ($i < 5) {
    echo $i;
    $i++;
    goto start;
}

for ($i=0; $i < 5; $i++) { 
    echo $i;
}
for ($i=0; $i < 5;  print $i , $i++);