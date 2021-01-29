<?php

//=============================   _GET (данные отправляются в явном виде, через строку запроса)

function hello()
{

    if ($_GET['name'] === 'masha') {
        $_GET['name'] .= ' ivanova';
    }

}

hello();
if ($_GET) {
    var_dump($_GET);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="">
    <input type="text" name="name">
    <input type="submit" name="send">
</form>

</body>
</html>


<?php
// ============================= _POST (данные отправляются в теле запроса, скротом от глаз пользователя)
// ============================= _FILES (файлы отправляются только через _POST)

function hello1()
{

    if ($_POST['name'] === 'kate') {
        $_POST['name'] .= ' petrova';
    }

}

hello1();
if ($_POST) {
    var_dump($_POST);
}
if ($_FILES) {
    var_dump($_FILES);
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="name">
    <input type="file" name="file">
    <input type="submit" name="send">
</form>

</body>
</html>

<?php

// ============================= _REQUEST (массив содержащий в себе все данные, независимо от типа запроса)

function hello2()
{

    if ($_REQUEST['name'] === 'john') {
        $_REQUEST['name'] .= ' sidorov';
    }

}

hello2();
if ($_REQUEST) {
    var_dump($_REQUEST);
}
if ($_FILES) {
    var_dump($_FILES);
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="name">
    <input type="file" name="file">
    <input type="submit" name="send">
</form>

</body>
</html>


























































