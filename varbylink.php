<?php

$name = 'Masha';

function reName1 ($newName, &$innerName, &$other = false) {

    $innerName = $newName;

    echo $innerName;

    $other = 'Hello';

    return 'world';

}
$str = reName1('Olga', $name, $other);

var_dump($str);

echo '<br>' . $name;

var_dump($other);













