<?php

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


function declOfNum($num, $titles)
{
    $cases = [2, 0, 1, 1, 1, 2];

    return $num . " " . $titles[($num % 100 > 4 && $num % 100 < 20) ? 2 : $cases[min($num % 10, 5)]];
}

echo declOfNum(234, ['человек просит', 'человека просят', 'человек просят']);

echo '<br>';

//  ================

$m = date('i');

function endings($m)
{
    $m0 = $m % 10;

    if ($m >= 5 && $m <= 20) {
        $res = ' минут';
    } elseif ($m0 == 1) {
        $res = ' минута';
    } elseif ($m0 >= 2 && $m0 <= 4) {
        $res = ' минуты';
    } else {
        $res = ' минут';
    }

    return $res;
}

echo $m . ' ' . endings($m);



























































