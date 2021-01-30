<?php

// ШАБЛОН РЕГУЛЯРНЫХ ВЫРАЖЕНИЙ - НЕКИЙ ПРИМЕР ВХОЖДЕНИЯ УСЛОВНО ПОДСТРОКИ В СТРОКУ

$str = 'Masha is 2  __ + 4 - # $ % 5 ˆ 6 VERY 
beautiful  ';


$res1 = preg_match('/ex/', $str, $matches); // ищет соответствие по первому вхождению конкретных символов

$res2 = preg_match_all('/ex/', $str, $matches); // ищет соответствие по всем вхождениям конкретных символов

$res3 = preg_match_all('/a-zA-Z0-9/', $str, $matches); // ищет соответствие в диапазоне

$res4 = preg_match_all('/\w/', $str, $matches); // ищет соответствие всего лат. алфавита, цифр и _

$res5 = preg_match_all('/\W/', $str, $matches); // ищет соответствие кроме того, что ищет \w

$res6 = preg_match_all('/\d/', $str, $matches); // ищет соответствие только цифры

$res7 = preg_match_all('/\D/', $str, $matches); // ищет соответствие только не цифры

$res8 = preg_match_all('/\n/', $str, $matches); // ищет соответствие на перенос строки

$res9 = preg_split('/\s/', $str); // ищет все разделители слов (пробелы, табуляции, переносы строк)

$res10 = preg_split('/\S/', $str); // ищет все кроме пробелов, табуляций, переносов строк

$res11 = preg_split('/\t/', $str); // ищет табуляции


var_dump($res1);
var_dump($res2);
var_dump($res3);
var_dump($res4);
var_dump($res5);
var_dump($res6);
var_dump($res7);
var_dump($res8);
var_dump($res9);
var_dump($res10);
var_dump($res11);




































