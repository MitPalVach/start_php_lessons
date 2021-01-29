<?php

// cookie - файлы, которые хранят информацию от сервера на стороне клиента

if ($_COOKIE) {
    setcookie('name', '', 1, '/'); //удаление куки выставление time на 1 сек

    var_dump($_COOKIE);

} else {
    setcookie('name', 'masha', 0, '/');
    setcookie('name', 'masha', time() + 60*60*24*365*5 , '/temp1'); // выставлено куки только для паки temp1 и на 5 лет
}





































