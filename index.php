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
//$text = null;
//if (isset($_GET['id'])) {
//    $id = $_GET["id"];
//    $text = file_get_contents("img/{$id}");
//
//}
//
//$files = scandir('img');
//
//foreach ($files as $file) {
//    if (is_file('img/' . $file)) {
//        echo "<a href=\"index.php?id=$file\">News $file</a>" . ' ';
//    }
//}
//
//if ($text) {
//    echo nl2br($text);
//}


//  ====================================================================================================================

if (count($_POST) > 0) {
    $name = trim($_POST['name']);
    $pass = $_POST['password'];
    $tel = $_POST['phone'];
    $date = date('Y.m.d H:i:s');

    if (mb_strlen($name) < 2) {
        $msg = 'Имя не может быть таким коротким :)';
    } elseif (strlen($tel) < 7) {
        $msg = 'В поле Телефон должно быть больше цифр!';
    } elseif (!is_numeric($tel)) {
        $msg = 'В поле Телефон должны быть только цифры!';
    } else {
        file_put_contents('shapka.txt', "$date -|- $name -|- $pass -|- $tel\n", FILE_APPEND);
        $msg = 'Ваша заявка принята, ожидайте звонка!';
    }
} else {
    $name = '';
    $tel = '';
    $pass = '';
    $msg = 'Привет! Заполните поля и нажмите Отправить';
}


?>

        <form action="" method=post>
            Имя<br>
            <input type="text" name='name' value='<?= $name ?>'><br>
            Пароль<br>
            <input type="password" name='password' value='<?= $pass ?>'><br>
            Телефон<br>
            <input type="tel" name='phone' value='<?= $tel ?>'><br>
            <input type="submit" value="отправить"><br>
        </form>
<?php

echo $msg;






































