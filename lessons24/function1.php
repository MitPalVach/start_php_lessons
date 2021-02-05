<?php

// ОБЛАСТИ ВИДИМОСТИ ПЕРЕМЕННЫХ ВНУТРИ ФУНКЦИЙ

$glob = 'Masha';

function hello($str){

    global $glob; // глобализация переменной (опасно)

    echo '<br>' .$str . ' ' . $glob . '<br>';

    $glob = 'Kate';

}

echo $glob;

$hello = 'Hello';
$hello1 = 'Hi';

hello($hello);

echo '<br>' .$glob;

// ==========================================================

$dop = 'John';

$foo = function ($str) use ($dop) {

    echo '<br>' . $str . ' ' . $dop . '<br>';

$dop = 'Leo'; // переменная ни на что не влияет, она не глобальная, основная выведена выше

};

$foo('Hello');

echo $dop;
