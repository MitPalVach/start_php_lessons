<?php

$arr['lang'] = 'javascript';

$language = 'php';

$str = "I am learning {$arr['lang']} and {$language}";

$final = 'Hello, ';

$str_end = " ... I know php and {$arr['lang']}";

$final .= $str . $str_end;

$text = <<< heredoc
"I am 'learning' {$language}"
heredoc;
// выше текст с любыми кавычками и прочим, просто копи-паст любого текста

$a = scandir(__DIR__);

var_dump($final);
var_dump($text);
var_dump($a);

// ДИНАМИЧЕСКАЯ ТИПИЗАЦИЯ - ПОПЫТКА КОМПЕЛЯТОРА ПЕРЕМЕННУЮ ПОДСТРОИТЬ ПОД РЕЗУЛЬТАТ ВЫРАЖЕНИЯ:

//не явное приведение типов

$b = 1;

$c = '2.7e2str4ing';

$result = $b . $c;
$result2 = $b + $c;

var_dump($result);
var_dump($result2);

//явное приведение

$e = (string)$b;

$d = (int)$c;

$f = (array)$b;

var_dump($e);
var_dump($d);
var_dump($f);






















