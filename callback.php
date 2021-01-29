<?php

//function userConnect($db){
//
//    return function ($user) use ($db) {
//
//        echo $user . ' connect to database ' . $db . '<br>';
//
//    };
//
//} // Замыкание - функция возвращает другую функцию
//
//$db = userConnect('new Base');
//
//$db('Masha');
//$db('Kate');

// =====================================================

// Callback

function userConnect($db, $user, $callback) {

    $c = $user . ' connect to database ' . $db . '<br>';

    $res = $callback($c);

    echo $res . 'good';

}

userConnect('newBase', 'Masha', function ($answer){

    return 'gc ' . $answer;

});
















