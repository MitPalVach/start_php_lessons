<?php

const BR = '</br>';

$a = mt_rand(-10, 10);
$b = mt_rand(-10, 10);


//if (($a > $b) && ($a > 0) && ($b > 0)) {
//    var_dump("a " . $a . "___" . "b " . $b);
//} else {
//    var_dump('нет');
//}

function game($a, $b)
{

    if ($a <= 0 && $b <= 0) {
        var_dump("net");
    } elseif ($a > $b) {
        var_dump("a " . $a);
    } else {
        var_dump("b " . $b);
    }
}

game(mt_rand(-10, 10), mt_rand(-10, 10));

function walk($money, $list)
{

}

walk(1000, ['milk', 'bread', 'butter', 'meet']);
walk(100, ['milk', 'bread']);
walk(null, ['milk']);


//  ====================================================================================================================

echo BR;

//  ================ Склонение числительных


function endings($m, $variants)
{
    $m1 = $m % 100;
    $m0 = $m % 10;

    if ($m1 >= 5 && $m1 <= 20) {
        $res = $variants[0];
    } elseif ($m0 == 1) {
        $res = $variants[1];
    } elseif ($m0 >= 2 && $m0 <= 4) {
        $res = $variants[2];
    } else {
        $res = $variants[0];
    }

    return $res;
}

$m = ['минут', 'минута', 'минуты'];
for ($i = 0; $i < 60; $i++) {
    echo $i . ' ' . endings($i, $m) . BR;
}


$m = ['товаров', 'товар', 'товара'];
for ($i = 0; $i < 60; $i++) {
    echo $i . ' ' . endings($i, $m) . BR;
}

$m = ['дней', 'день', 'дня'];
for ($i = 0; $i <= 365; $i++) {
    echo $i . ' ' . endings($i, $m) . BR;
}






















































