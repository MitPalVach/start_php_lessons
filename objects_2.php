<?php


interface PersonWriter
{
    public function write(Person $person);
}


class Account
{
    public $balance;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}


class Person
{

    public function output(PersonWriter $writer)
    {
        $writer->write($this);
    }

    public function getName(): string
    {
        return "Иван";
    }

    public function getAge(): int
    {
        return 44;
    }

    function __toString(): string
    {
        $desc = $this->getName();
        $desc .= " (возраст " . $this->getAge() . " лет)";
        return $desc;
    }

    protected $name;
    private $age;
    private $id;
    public $account;

    public function __construct(string $name, int $age, Account $account)
    {
        $this->name = $name;
        $this->age = $age;
        $this->account = $account;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function __clone()
    {
        // TODO: Implement __clone() method.
        $this->id = 0;
    }

// ==========   __destruct   =================
//    public function __destruct() {
//        if (! empty($this->id)) {
//            // сохранить данные из экземпляра класса Person
//            print "Сохранение персональных данных " . '<br>';
//        }
//    }
// ==========   __destruct end  =================
}


$person = new Person("Иван", 44, new Account(200));
$person->output(
    new class ("/tmp/persondump") implements PersonWriter {
        private $path;

        public function __construct(string $path)
        {
            $this->path = $path;
        }

        public function write(Person $person)
        {
            // TODO: Implement write() method.
            print $person->getName() . " " . $person->getAge() . '<br>';
        }
    }
);


$person->setId(343);
$person2 = clone $person;
//  все данные скопируются, кроме id, который станет равным 0
$person->account->balance += 10; //  это отразится и на $person2
echo $person2->account->balance . " руб. <br>";


class Product
{
    public $name;
    public $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}


class ProcessSale
{
    private $callbacks;

    public function registerCallback(callable $callback)
    {
        if (!is_callable($callback)) {
            throw new Exception("Функция обратного вызова - невызываемая!");
        }
        $this->callbacks[] = $callback;
    }

    public function sale(Product $product)
    {
        print "{$product->name}: обрабатывается...<br>";
        foreach ($this->callbacks as $callback) {
            call_user_func($callback, $product);
        }
    }

}


class Mailer
{
    public function doMail(Product $product)
    {
        print " Отправляется ({$product->name})<br>";
    }
}


class Totalizer
{
    public static function warnAmount()
    {
        return function (Product $product) {
            if ($product->price > 5) {
                print " покупается дорогой товар: {$product->price}<br>";
            }
        };
    }
}


class Totalizer2
{
    public static function warnAmount($amt)
    {
        $count = 0;
        return function ($product) use ($amt, &$count) {
            $count += $product->price;
            print " сумма: $count<br>";
            if ($count > $amt) {
                print "\n Продано товаров на сумму: {$count}<br>";
            }
        };
    }
}


//$logger = function ($product) {
//print " Записываем ({$product->name}) Цена: {$product->price}\r\n<br />";
//};

$processor = new ProcessSale();
$processor->registerCallback(Totalizer2::warnAmount(8));

$processor->sale(new Product("Туфли", 6));
print "\n";
$processor->sale(new Product("Кофе", 4));












