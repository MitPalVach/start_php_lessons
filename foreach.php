<?php

$i = 10;

$arr2 = [
    'кошелек' =>500,
    'конверт' => 'работа',
    'чехол' => 'false',
//    'arr3' => ['ipad', 'iphone', 'ipod', ['samsung', 'gnusmas']]
];


//foreach ($arr2 as $key => $item) {
//
//    echo '$key - ';
//    var_dump($key) . '<br>';
//
//    echo '$item - ';
//    var_dump($item) . '<br>';
//
//}
//
//// можно и без ключа
//
//foreach ($arr2 as $item) {
//
//    echo '$item - ';
//    var_dump($item) . '<br>';
//
//}

foreach ($arr2 as $key => $item) {

$item .= ' !!!';
echo $item . '<br>';

}
var_dump($arr2);











