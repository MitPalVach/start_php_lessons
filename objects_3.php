<?php
$h = date('H');

if ($h < 6) {
    $img = 'night';
} elseif ($h < 12) {
    $img = 'morning';
} elseif ($h < 18) {
    $img = 'day';
} else {
    $img = $dir . 'evening' . $ext;
}


?>

    <!doctype html>

    <head>
        <title>Document</title>
        <style>
            body {
                background: url('<?=$img?>');
                color: #000;
                background-size: cover;
            }
        </style>
    </head>
    <body>
    <?= $h ?>
    </body>


<?php






















































