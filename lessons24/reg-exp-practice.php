<?php
//$str = <<< heredoc
//<!doctype html>
//<html lang="en">
//<head>
//    <meta charset="UTF-8">
//    <meta name="viewport"
//          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
//    <meta http-equiv="X-UA-Compatible" content="ie=edge">
//    <title>Document</title>
//    <link rel="stylesheet" href="sd">
//</head>
//<body>
//<div>
//    <a class="class-1" href='aphina-1'></a>
//    <a href="aphina-2" class="class-2"></a>
//    <a class="class-3" href="aphina-3"></a>
//    <a href='aphina-4' class="class-4"></a>
//    <a href="aphina-5" class="class-5"></a>
//</div>
//</body>
//</html>
//heredoc;
//
////$res = preg_match_all('/href="([^"]+)"/', $str, $matches); // поиск по ссылкам
////$res = preg_match_all('/<a\s+[^>]*?href\s*=\s*"([^>]+?)"/', $str, $matches); // поиск тегам а
////$res = preg_match_all('/<a\s+[^>]*?href\s*=\s*([\'"])([^>]+?)\1/', $str, $matches); // поиск по тегам а с разным оформлением ' или "


//======================== получение массива вхождений, например без 'page' =========
//=========пример без регулярных выражений

$str = '/controller/url/other/page/white/blue';

//$res = array_filter(explode('/', $str));
//foreach ($res as $key => $item) {
//    if($item === 'page')unset($res[$key]);
//}
//$res = array_values($res);

//=========пример с регулярными выражениями

$res = preg_match_all('/\/((?!page)[^\/]+)/',$str,$matches);

exit();





















