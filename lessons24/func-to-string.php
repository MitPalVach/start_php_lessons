<?php

$str = 'masha is very beautiful  ?/&  ';

var_dump($str);

//$data = strlen($str); // кол-во байт
//$data = mb_strlen($str); // кол-во символов (mb - мультибайтовый)

$needle = 'masha';

//$data = strpos($str, $needle); // поиск подстроки в строке
//$data = stripos($str, $needle); // регистро-независимый поиск
//$data = strrpos($str, $needle); // поиск последнего вхождения
//$data = strripos($str, $needle); // регистро-независимый поиск последнего вхождения

//$data = substr($str, 6, 2); // вырезает из строки заданное кол-во символов

//$data = substr($str, strpos($str, $needle), strlen($needle)); // поиск неизвестного имени в строке

//$data = trim($str, ' &/?'); // обрезает любые символы и пробелы из строки

//$data = str_replace($needle, 'Olga', $str);

$data = explode(' ', $str);


var_dump($data);


















