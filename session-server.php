<?php

// $_SESSION - хранит данные пользователя на сервере (можно хранмить как строку так и массив)

session_start(); // регистрация $_SESSION

var_dump($_SESSION);

//$_SESSION['res'] = 'sdasdas';
$_SESSION['res'] = ['first', 'second', 3];

unset($_SESSION['res']); // разрегистрация $_SESSION

//===============================================================


















