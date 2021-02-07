<?php
//  ===================================================================================== Перегрузка и магические методы
//  Перегрузка в PHP дает возможность динамически "создавать" свойства и методы. Такие методы и свойства обрабатываются
//  с помощью "волшебных" методов, которые можно создать в классе для различных видов действий.
//  ========================================= Перегрузка свойств
//  Обращения к свойствам объекта могут быть перегружены с использованием методов __get и __set. Эти методы будут
//  срабатывать в том случае, если объект не содержит свойства, к которому осуществляется доступ.
class MyClass {
    public $c = 'c value';
    public function __set($name, $value) {
        echo '__set, property - {$name} is not exist' . '<br>';
    }
    public function __get($name) {
        echo '__get , property - {$name} is not exist' . '<br>';
    }
}
$obj = new MyClass;
$obj->a = 1; // запись в свойство (свойство не существует)
echo $obj->b . '<br>'; // получаем значение свойства (свойство не существует)
echo $obj->c . '<br>'; // получаем значение свойства (свойство не существует)
//  ======================================== Перегрузка методов
//  Вызовы методов могут быть перегружены с использованием методов __call. Эти методы будут срабатывать в том случае,
//  если объект не содержит метода, к которому осуществляется доступ.
class MyClass_1 {
    public function __call($name, $arguments) {
        return '__call, method - {$name} is not exist';
    }
    public function getId() {
        return 'AH-15474';
    }
}
$obj_1 = new MyClass_1;
echo $obj_1->getName() . '<br>'; //  вызов метода (метод не существует)
echo $obj_1->getId() . '<br>'; //  вызов метода (метод не существует)
//  ========================================= Магический метод __toString
//  Метод __toString() будет срабатывать при попытке преобразования класса в строку. Например, echo $obj;
class MyClass_2 {
    public function __toString() {
        return 'MyClass_2 class';
    }
}
$obj_2 = new MyClass_2;
echo $obj_2 . '<br>'; //  результат MyClass_2 class
//  ======================================== Магический метод __invoke()
// Метод __invoke() вызывается, когда объект пытаются вызвать как функцию.
class MyClass_3 {
    public function __invoke($a) {
        return $a;
    }
}
$obj_3 = new MyClass_3;
echo $obj_3(75) . '<br>'; // результат: 75
// ======================================================================================================= Контроль типа
//  При передаче параметром есть возможность проверить данные на такие типы: объекты (путем указания имени класса в
//  прототипе функции), интерфейсы, массивы, колбеки с типом callable
class MyClass_4 {
    public function names(array $names) {
        $res = '<ul>';
        foreach ($names as $name) {
            $res .= '<li>{$names}</li>';
        }
        return $res .= '</ul>';
    }
    public function otherClassTypeFunc(OtherClass $otherClass) {
        return $otherClass->var1;
    }
}
$obj_4 = new MyClass_4;
$names = array(
    'Jane Doe',
    'Kate Moss',
    'Bob Brown',
    'Tim Roth'
);
echo $obj_4->names($names) . '<br>'; // работает
$names = 'Kate Moss';
//  получим фатальную ошибку: Argument 1 passed to MyClass::names() must be of the type array, string given
echo $obj_4->names($names) . '<br>';
// получим фатальную ошибку: Argument 1 passed to MyClass::names() must be an instance of OtherClass, string given
echo $obj_4->otherClassTypeFunc('test string');
// =================================================================================================== Пространства имен
//  Пространства имен, это один из способов инкапсуляции элементов. Такое абстрактное понятие можно увидеть во многих
//  местах. Например, в операционной системе директории служат для группировки файлов и выступают в качестве
//  пространства имен для находящихся в них файлов. Например файл text.txt может находиться сразу в нескольких
//  директориях: /files и /docs, но две копии text.txt не могут существовать в одной директории. Также, для доступа к
//  text.txt извне, мы должны добавить имя директории перед именем файла используя разделитель (/files /text.txt).
//  Такой же принцип распространяется и на пространства имен.
//  В PHP пространства имен используются для решения двух проблем:
//  1. Конфликт имен между вашим кодом и сторонними.
//  2. Возможность создавать псевдонимы (или сокращения) для длинных имен, чтобы облегчить первую проблему и улучшить читаемость исходного кода.
//  Пример использования: Допустим, у нас такая файловая структура:
//  -- App
//  --- Main
//  ---- MyClass.php
//  - namespace.php
//  Опишем класс MyClasss_5.php:  App/Main/MyClass_5.php
namespace App\Main;
class MyClass_5 {
    function hello() {
        return 'hello';
    }
}
//  С помощью пространства имен мы можем получить доступ к классу MyClass_5 (файл namespace.php):
namespace App\Main;
require_once 'App\Main\MyClass_5.php';
$obj_5 = new \App\Main\MyClass_5;
echo $obj_5->hello() . '<br>';  // hello
//  Исходя из описания, мы можем создать такой же класс, только в другой директории. Давайте создадим класс с таким же
//  названием в папке App/Core.  App/Core/MyClass_5.php
namespace MyClass_5 {
    function hello() {
        return 'hello, it is core';
    }
}
//  Получим доступ к этому классу:
namespace App\Core;
require_once 'App\Core\MyClass_5.php';
$obj_5 = new \App\Core\MyClass_5;
echo $obj_5->hello() . '<br>';  // hello, it is core
//  ======================================== Создание псвевдонима имени
//  Псевдонимы для пространства имен используются для более простого доступа к нужному пространству. Например, такая
//  структура namespace App/Core/Controller/, чтобы получить доступ к одному из классов, нужно будет написать весь этот
//  путь - App/Core/Controller/AppController. Намного проще написать CoreController/AppController. Это можно
//  реализовать с помощью псеводнимов.
//  Для создания псевдонима используют ключевое слово use.
//      use App/Core/Controller as CoreController;
//      ...
//      $app = new CoreController/AppController;













