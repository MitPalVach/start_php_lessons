<?php
// ============================================================================================================== Классы
//  Класс является одним из типов данных. Каждое определение класса начинается с ключевого слова class, затем следует
//  имя класса, пара фигурных скобок, внутри которых можно определять свойства и методы этого класса.
//  Именем класса может быть любое слово, при условии, что оно не входит в список зарезервированных слов PHP, начинается
//  с буквы или символа подчеркивания и за которым следует любое количество букв, цифр или символов подчеркивания.
class A
{
    // ...
}

// ============================================================================================================= Объекты
//  Для создания экземпляра (объекта) класса используется директива new.
$instance = new A();
//  это можно сделать и с помощью переменной:
$className = 'A';
$instance = new $className();  // A()
// ========================================================================================== Конструкторы \ Деструкторы
//  Классы, в которых объявлен метод-конструктор, будут вызывать этот метод при каждом создании нового объекта.
class C
{
    function __construct($hello = 'hi')
    {
        return $hello;
    }
}

$instance = new C(); // вернет строку "hi"
$instance = new C('hello'); // вернет строку "hello"
//  =====
//  Деструктор будет вызван при освобождении всех ссылок на определенный объект или при завершении скрипта
//  (порядок выполнения деструкторов не гарантируется).
class D
{
    function __destructor() {
        echo 'Вызов деструктора';
    }
}

// ================================================================================================== Свойства и функции
//  Переменные в классе, называются "свойствами", также их называют "атрибуты" или "поля". Они определяются с помощью
//  ключевых слов public, protected, или private, следуя правилам правильного описания переменных.
class FirstClass
{
    public $var1 = 'hello';
    private $var = 25;
    protected $var3 = ['one', 'two'];
}

//  Функция в классах называются "методом". Процесс описания метода происходит как при описании обычной функции. Например:
class SecondClass
{
    public function firstFunction()
    {
        $a = 25;
        $b = 35;
        return $a + $b;
    }
}

//  В пределах методов класса доступ к свойствам может быть получен с помощью -> (объектного оператора) и указателя
//  $this, например $this->var1 (var1 – имя переменной) или $this->firstFunction() (firstFunction – имя метода). Пример:
class ThirdClass
{
    private $var1;

    public function setVar1($value)
    {
        $this->var1 = $value;
    }
}

$instance = new ThirdClass();
$instance->setVar1('orange'); //  установим значение 'orange' для переменной var1
// ================================================================================ Объявление и использование Константы
class ForthClass
{
    const CONSTANT = 'value';
    const CONSTANT2 = 80 * 2 + 40;
}

//  доступ к константе:
echo ForthClass::CONSTANT . '<br>';

//  через метод в классе:
class FifthClass
{
    const CONSTANT = 'orange';

    function myFunc()
    {
        echo self::CONSTANT;
    }
}
// ======================================================================================================== Наследование
//  Чтобы создать наследование от другого класса нужно использовать оператор extends
class SixthClass {
    public $var1 = 'value1';
    protected function func1() {

    }
    public function func2(){

    }
}
class SeventhClass extends SixthClass {
    public $var2 = 'value2';
}
$sixc = new SixthClass();
$sevc = new SeventhClass();
echo $sixc->var1 . '<br>'; // value1
echo $sevc->var1 . '<br>'; // value1
$sevc->func2(); // работает
echo $sevc->var2 . '<br>'; // value2
//  Если мы попытаемся вызвать метод $sevc->func1(), то получим ошибку, из-за того, что метод func1 определен в
//  родительском классе как protected, он не может быть вызван снаружи.
// ================================================================================================== Абстрактные классы
//  Класс, который содержит хотя бы один абстрактный метод, должен быть определен как абстрактный. Абстрактные классы
//  реализуют на практике один из принципов ООП — полиморфизм. Нельзя создать экземпляр абстрактного класса. Методы,
//  объявленные абстрактными, лишь описывают смысл и не могут включать реализации.
//  При наследовании от абстрактного класса, все методы, помеченные абстрактными в родительском классе, должны быть
//  определены в классе-потомке; кроме того, область видимости этих методов должна совпадать (или быть менее строгой).
//  Более того, контроль типов и количество обязательных аргументов должно быть одинаковым.
abstract class AbstClass {
//  Данный метод должен быть определен в дочернем классе
    abstract protected function getValue();
//  ОБщий метод
    public function printValue() {
        print $this->getValue() . "\n";
    }
}
class EighthClass extends AbstClass
{
    protected function getValue()
    {
        return 'EighthClass';
    }
}
$class1 = new EighthClass();
$class1->printValue();
echo '<br>';
// ============================================================================================= Ключевое слово "static"
//  Объявление свойств и методов класса статическими (static) позволяет обращаться к ним без создания экземпляра класса.
//  Атрибут класса, объявленный статическим, не может быть доступен посредством экземпляра класса
//  (но статический метод может быть вызван).
//  Доступ к статическим свойствам класса может быть получен через оператор ::
//  Существует возможность ссылаться на класс используя переменную. Поэтому значение переменной в таком случае не может
//  быть ключевым словом (например, self, parent и static).
class NinthClass {
    public static $var1 = 'var1';
    public function staticValue() {
        return self::$var1;
    }
}
class TenthClass extends NinthClass
{
    public function var1Static() {
        return parent::$var1;
    }
}
echo NinthClass::$var1 . '<br>';
//  Пример статического метода
class EleventhClass {
    public static function myStaticMethod() {
        // ...
    }
}
EleventhClass::myStaticMethod(); //  Вызов метода
// ========================================================================================================== Интерфейсы
//  С помощью интерфейсов можно описать методы, которые должны быть реализованы в классе без необходимости описания их функционала.
//  Интерфейсы объявляются так же, как и обычные классы, но с использованием ключевого слова interface.
//  Тела методов интерфейсов должны быть пустыми.
//  Методы, внутри интерфейса, должны быть определены как публичные. Объявляем интерфейс 'CarTemplate':
interface CarTemplate
{
    public function getId(); // получить id автомобиля
    public function getName(); // получит название
    public function add(); // добавить новый автомобиль
}
//  Для реализации интерфейса используется оператор implements. Класс должен реализовать все методы, описанные в
//  интерфейсе; иначе произойдет фатальная ошибка. Если нужно, то классы могут реализовывать более одного интерфейса,
//  реализуемые интерфейсы должны разделяться запятой.
class Audi implements CarTemplate {
    function getId()
    {
     return '1-ATHD98';
    }
    public function getName()
    {
     return 'Audi';
    }
    function add()
    {
     //
    }
}
class Bmw implements CarTemplate {
    public function getId()
    {
     return '2-HHFY14';
    }
    function getName()
    {
     return 'BMW';
    }
    public function add()
    {
     //
    }
}













