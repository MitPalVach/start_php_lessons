<?php

$n = 1; // int

$a = 354.0; // float

$b = 'message for friend'; // string

$bool = false; // boolean

$null = null; //null

var_dump($a + $n);
var_dump($b);
var_dump(isset($bool));
var_dump(isset($null));

$arr1 = array(100, 'message', true); // нумерованный массив

$arr2 = [
    'кошелек' =>500,
    'конверт' => 'работа',
    'чехол' => false,
    'arr3' => ['ipad', 'iphone', 'ipod', ['samsung', 'gnusmas']]
]; // ассоциативный массив

var_dump($arr1);
var_dump($arr2);

$obj = new stdClass(); // объект

$obj-> a = 'I am property A'; // свойство объекта ( property of object )
$obj-> b = $arr1;

var_dump($obj);

$f = fopen('app.html', 'r'); // рессурс, указатель на некие внешние данные

var_dump($f);








































