<?php

$_GET['ahsgdaushgda'] = 'Horror';

function &reMake($str)
{

    $_GET['ahsgdaushgda'] = $str;

    return $_GET['ahsgdaushgda'];

}

$new = &reMake('All right');

var_dump($new);

$new = '2222';

var_dump($new);
var_dump($_GET['ahsgdaushgda']);









