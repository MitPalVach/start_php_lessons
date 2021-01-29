<?php

$a = foo(1);

echo $a;

function foo($num, $num1 = 2, $num2 = 6) {

    return $num + $num1 + $num2 . '<br>';

}

echo foo(50, 60, 20);













