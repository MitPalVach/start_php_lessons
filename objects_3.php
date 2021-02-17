<?php
$h = date('H');

if ($h < 6) {
    $img = 'night';
} elseif ($h < 12) {
    $img = 'morning';
} elseif ($h < 18) {
    $img = 'day';
} else {
    $img = 'evening';
}


?>
<!doctype html>
<head>
    <title>Document</title>
    <style>
        body {
            background: url('img/<?php echo $img;?>.jpg '); color: #000000; background-size: cover; }
    </style>
</head>
<body>
<?php echo $h; ?>
</body>
</html>























































