<?php

$speed = 89;
if ($speed > 60 && $speed <=80) {
    echo 'превышение' . '<br>';
    echo "Ваша скорость {$speed} км\ч";
} elseif ($speed >= 50 and $speed<=60) {
    echo 'нормально' . '<br>';
    echo "Ваша скорость {$speed} км\ч";
} elseif (50 > $speed) {
    echo 'слишком медленно' . '<br>';
    echo "Ваша скорость {$speed} км\ч";
} else {
    echo 'штраф' . '<br>';
    echo "Ваша скорость {$speed} км\ч";
}











