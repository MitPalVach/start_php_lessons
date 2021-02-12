<!-- ===================================================================================== Получение данных от формы -->
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
<form action="../app/check.php" method=post>
    <p>Имя: <input name='name' type="text"></p>
    <p>Фамилия: <input name='surname' type="text"></p>
    <p>E-mail: <input name='email' type="text"></p>
    <p>Сообщение: <br /> <textarea name="message" cols="30" rows="5"></textarea></p>
    <p><input type="submit" value='Отправить'></p>
</form>
</body>
</html>
<!--  action="app/check.php" — это адрес обработчика формы, сюда будут отправляться данные формы, после нажатия-->
<!--  кнопки Отправить. Передавать данные будем методом - POST.-->
<?php





































