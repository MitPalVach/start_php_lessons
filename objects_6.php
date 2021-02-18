<?php

$id = $_GET['id'];
$text = file_get_contents('img/$id.pages');

?>
Шапка
<hr>
<a href="index.php?id=1">News 1</a>
<a href="index.php?id=2">News 2</a>
<a href="index.php?id=3">News 3</a>
<?php
echo nl2br($text);

?>
<hr>
Подвал














































