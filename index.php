<?php

const BR = '<br>';

//function getName($name)
//{
//
////    sdfsdf
////    fsdfsdf
////    sfsdfsdf
////    sdfsdf
//
//    return 'Folly';
//}
//
//

//  ====================================================================================================================

//if (!isset($_GET['id'])) {
//    exit('No id - 404');
//}
//
//$id = $_GET["id"];
//$text = file_get_contents("img/$id");
//
//$files = scandir('img');
//
//foreach ($files as $file) {
//    if (is_file('img/' . $file)) {
//        echo "<a href=\"index.php?id=$file\">News $file</a>" . ' ';
//    }
//}
//
//echo nl2br($text);

//  ====================================================================================================================

if (count($_POST) > 0) {
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $tel = $_POST['phone'];
//    $date = $_POST['date'];



    file_put_contents('shapka.txt', "$name $pass $tel\n", FILE_APPEND);
}

echo 'Ваша заявка принята, ожидайте звонка!';

?>

<form action="" method=post>
    Имя<br>
    <input type="text" name='name'><br>
    Пароль<br>
    <input type="password" name='password'><br>
    Телефон<br>
    <input type="tel" name='phone'><br>

    <input type="submit" value="отправить"><br>
</form>







































