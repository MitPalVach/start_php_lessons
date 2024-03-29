<?php

$a = [1];
$b = 2;
$c = 3;

// ================================================= for
//  for (exp1; exp2; exp3) statement
//  В выражение exp1 вставляют начальное значение для счетчика цикла — переменная, которая считает количество раз выполнения тела цикла.
//  exp2 — задает условие повторения цикла. Цикл будет выполнятся пока это условие будет true.
//  exp3 — выполняется каждый раз после выполенения тела цикла. Обычно, оно используется для изменения (увеличение или уменьшение) счетчика.
//  for ($i = 0; $i < 10; $i++)
//  {
//     echo "Вывод строки. 10 раз <br>";
//  }

$i = 0;
for (;;){
    echo 2 . '<br>';
    $i++;
    if($i === 10) break;
}

// тоже самое, просто разные виды записи

for ($e = 0; $e < 20; $e++) {
    echo 1 . '<br>';
}

// ================================================ while
//  Цикл WHILE, вместо использования счетчика цикла проверяет некоторое условие до того, пока это условие Истина (TRUE). Синтаксис:
//  while (exp) statement
//  Условие проверяется перед выполнением цикла, если оно будет Ложным в начале, то цикл не выполнится ни разу!
//  В теле цикла должна быть переменная которая будет оказывать влияние на условие, чтобы предотвратить зацикливание. Пример:
//  $counter = 0;
//  while ($counter < 5)
//  {
//     echo "Эта строка выведется 5 раз <br>";
//     $counter++;
//  }

$d = 0;
while ($d < 15) {
    echo 3 . '<br>';
    $d++;
}

// ================================================ do while
//  Главное отличие цикла DO ... WHILE от WHILE в том, что первый сначала выполняется тело цикла, а потом проверяет условие.
//  Т.е., если условие сразу Ложь, то цикл выполнится один раз.
//  do
//     statement
//  while (condition)
//  $counter = 6;
//  do
//  {
//     echo "Эта строка выведется 1 раз <br>";
//     $counter++;
//  }
//  while ($counter < 5);
//  Так как условие цикла сразу Ложь (6 > 5), то цикл выполнился всего один раз, так как сначала выполняется тело цикла, а потом проверяется условие цикла.

do {
    echo 2 . '<br>';
    $d++;
} while($d < 15);






















