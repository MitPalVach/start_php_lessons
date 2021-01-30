<?php

// ШАБЛОН РЕГУЛЯРНЫХ ВЫРАЖЕНИЙ - НЕКИЙ ПРИМЕР ВХОЖДЕНИЯ УСЛОВНО ПОДСТРОКИ В СТРОКУ

$str = <<<heredoc
Masha is,   2 __ + 4 - #  $ % 5     6 VERY beautiful ';
heredoc;

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


$res12 = preg_match_all('/a(s|\s)/', $str, $matches); // () - является подмаской, т.е. ищет 'as' или 'a '
$res13 = preg_match_all('/a./', $str, $matches); // ищет 'a' с любым далее символом
$res14 = preg_match_all('/\s{2,4}\w/', $str, $matches); // ищет от 2 до 4 пробелов
$res15 = preg_match_all('/[ˆ,]\s{3,}\w/', $str, $matches); // ищет от 3 пробела, но без , в начале
$res16 = preg_match_all('/ˆ[A-Z]/', $str, $matches); // ищет заглавную букву в начале строки
$res17 = preg_match_all('/[A-Z]$/', $str, $matches); // ищет заглавную букву в конце строки
$res18 = preg_match_all('/.+\s+/', $str, $matches); // жадность квантификаторов
$res19 = preg_match_all('/.+?\s+/', $str, $matches); // урезание квантификаторов
$res20 = preg_match_all('/[а-яА-Я]+/uim', $str, $matches); // u - ищет по рус. кодировке / i - по строчным и заглавным / m - по мультистрочным


var_dump($res12);
var_dump($res13);
var_dump($res14);
var_dump($res15);
var_dump($res16);
var_dump($res17);
var_dump($res18);
var_dump($res19);
var_dump($res20);

































