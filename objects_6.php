<?php

$id = $_GET['id'];
if ($id) {
    $text = file_get_contents("img/{$id}.jpg");
}

?>
Шапка
<hr>
<a href="objects_6.php?id=1">News 1</a>
<a href="objects_6.php?id=2">News 2</a>
<a href="objects_6.php?id=3">News 3</a>
<?php
echo nl2br($text);
echo base64_encode($text);

?>
<hr>
Подвал














































