<?php

trait PriceUtilities
{

    public function calculateTax(float $price): float
    {
        return (($this->getTaxRate() / 100) * $price);
    }

    public abstract function getTaxRate(): float;
}


abstract class Service
{

}


class UtilityService extends Service
{
    use PriceUtilities {
        PriceUtilities::calculateTax as private;
    }

    private $price;

    public function __construct(float $price)
    {
        $this->price = $price;
    }

    public function getTaxRate(): float
    {
        return 17;
    }

    public function getFinalPrice(): float
    {
        return ($this->price + $this->calculateTax($this->price));
    }
}

$u = new UtilityService(100);
print $u->getFinalPrice(100) . '<br>';


trait IdentityTrait
{
    public function generateId()
    {
        return uniqid();
    }
}


abstract class DomainObject
{
    private $group;

    public function __construct()
    {
        $this->group = static::getGroup();
    }

    public static function create(): DomainObject
    {
        return new static();
    }

    public static function getGroup(): string
    {
        return 'default';
    }
}


class User extends DomainObject
{

}


class Document extends DomainObject
{
    public static function getGroup(): string
    {
        return "document";
    }
}


class SpreadSheet extends Document
{

}


print_r(User::create());
echo '<br>';
print_r(SpreadSheet::create());
echo '<br>';


//  ==========================================================================================================


class Conf
{
    private $file;
    private $xml;
    private $lastmatch;

    public function __construct(string $file)
    {
        $this->file = $file;
        if (!file_exists($file)) {
            throw new \Exception("Файл '$file' не найден");
        }
        $this->xml = simplexml_load_file($file, null, LIBXML_NOERROR);

        if (!is_object($this->xml)) {
            throw new XmlException(libxml_get_last_error());
        }
        $matches = $this->xml->xpath("/conf");
        if (!count($matches)) {
            throw new ConfException("Не найден корневой элемент: conf");
        }
    }


    public function write()
    {
        if (!is_writeable($this->file)) {
            throw new FileException("Файл '{$this->file}' не доступен по записи");
        }

        file_put_contents($this->file, $this->xml->asXML());
    }

    public function get(string $str)
    {
        $matches = $this->xml->xpath("/conf/item[@name=\"$str\"]");
        if (count($matches)) {
            $this->lastmatch = $matches[0];
            return (string)$matches[0];
        }
        return null;
    }

    public function set(string $key, string $vakue)
    {
        if (!is_null($this->get($key))) {
            $this->lastmatch[0] = $vakue;
            return;
        }
        $conf = $this->xml->conf;
        $this->xml->addChild('item', $vakue)->addAttribute('name', $key);
    }

    public static function init()
    {
        try {
            $fh = fopen(__DIR__ . "/log.txt", "a");
            fputs($fh, "Начало");
            $conf = new Conf(dirname(__FILE__) . "/conf.broken.xml");
            print "user: " . $conf->get('user') . '<br>';
            print "host: " . $conf->get('host') . '<br>';
            $conf->set("pass", "newpass");
            $conf->write();

        } catch (FileException $e) {
            // Файл не существует или не доступен
            fputs($fh, "Проблемы с файлом");
            throw $e;

        } catch (XmlException $e) {
            // Поврежденный XML-файл
            fputs($fh, "Проблемы с XML");

        } catch (ConfException $e) {
            // Неверный формат XML-файла
            fputs($fh, "Проблемы с конфигурацией");

        } catch (\Exception $e) {
            // Ловушка: этот код не должен вызываться
            fputs($fh, "Непредвиденные проблемы");
        } finally {
            fputs($fh, "Конец");
            fclose($fh);
        }
    }
}


class XmlException extends \Exception
{
    private $error;

    public function __construct(\LibXMLError $error)
    {
        $shortfile = basename($error->file);
        $msg = "[{$shortfile}, строка {$error->line}, столбец {$error->column}] {$error->message}";
        $this->error = $error;
        parent::__construct($msg, $error->code);
    }

    public function getLibXmlError()
    {
        return $this->error;
    }
}


class FileException extends \Exception
{

}


class ConfException extends \Exception
{

}


//  ==========================================================================================================


class ShopProduct extends UtilityService
{
    use PriceUtilities, IdentityTrait;

    private $title;
    private $producerMainName;
    private $producerFirstName;
    protected $price;
    private $discount = 0;


    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price
    ) {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
    }

    private $id = 0;

    public function setID(int $id)
    {
        $this->id = $id;
    }

    public static function getInstace(
        int $id,
        \PDO $pdo
    ): ShopProduct {
        $stmt = $pdo->prepare(
            "select * from products where id=?");
        $result = $stmt->execute([$id]);
        $row = $stmt->fetch();
        if (empty($row)) {
//            return null;
        }
        if ($row['type'] == "book") {
            $product = new BookProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price'],
                $row['numpages']
            );
        } elseif ($row['type'] == "cd") {
            $product = new CdProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price'],
                $row['playlength']
            );
        } else {
            $firstname = (is_null($row['firstname'])) ? "" : $row['firstname'];
            $product = new ShopProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price']
            );
        }
        $product->setID((int)$row['id']);
        $product->setDiscount((int)$row['discount']);
        return $product;
    }


    public function getProducerFirstName()
    {
        return $this->producerFirstName;
    }

    public function getProducerMainName()
    {
        return $this->producerMainName;
    }

    public function setDiscount($num)
    {
        $this->discount = $num;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getPrice()
//    public function getPrice(): float;
    {
        return $this->price;
    }

    public function CDInfo(CdProduct $prod)
    {

    }

    public function getProducer()
    {
        return $this->producerFirstName . " " . $this->producerMainName;
    }

    public function getSummaryLine()
    {
        $base = "{$this->title} ( {$this->producerMainName} . {$this->producerFirstName} )";
        return $base;
    }
}


$p = new ShopProduct("Нежное мыло", " ", "Ванная Боба", "1.33");
print $p->calculateTax(100) . '<br>';
print $p->generateId() . '<br>';


class Shipping implements Chargeable
{
    public function getPrice(): float
    {

    }
}

interface Chargeable
{
//        public function getPrice(): float;

}


abstract class ShopProductWriter
{
    protected $products = [];

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }

    abstract public function write();

//    {
//        $str = "";
//        foreach ($this->products as $shopProduct) {
//            $str .= "{$shopProduct->title}: ";
//            $str .= $shopProduct->getProducer();
//            $str .= "({$shopProduct->getPrice()})" . '<br>';
//
//        }
//    }

}


class XmlProductWriter extends ShopProductWriter
{
    public function write()
    {
        // TODO: Implement write() method.
        $writer = new \XMLWriter();
        $writer->openMemory();
        $writer->startDocument('1.0', 'UTF-8');
        $writer->startElement("products");
        foreach ($this->products as $shopProduct) {
            $writer->startElement("product");
            $writer->writeAttribute("title", $shopProduct->getTitle());
            $writer->startElement("summary");
            $writer->text($shopProduct->getSummaryLine());
            $writer->endElement(); //  "summary"
            $writer->endElement(); //  "product"
        }
        $writer->endElement(); //  "products"
        $writer->endDocument();
        print $writer->flush();
    }
}


class TextProductWriter extends ShopProductWriter
{
    public function write()
    {
        // TODO: Implement write() method.
        $str = "ТОВАРЫ: ";
        foreach ($this->products as $shopProduct) {
            $str .= $shopProduct->getSummaryLine();
        }
        print $str;
    }
}


//  =========================================================================================


class BookProduct extends ShopProduct
{
    private $numPages;

    public function __construct(string $title, string $firstName, string $mainName, float $price, int $numPages)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->numPages = $numPages;
    }

    public function getNumberOfPages()
    {
        return $this->numPages;
    }

    public function getSummaryLine()
    {
        $base = parent::getSummaryLine();
        $base .= "{$this->numPages} стр.";
        return $base;
    }

    public function getPrice()
    {
//        return parent::getPrice(); // TODO: Change the autogenerated stub
        return $this->price;
    }
}


class CdProduct extends ShopProduct
{
    private $playLength;

    public function __construct(string $title, string $firstName, string $mainName, float $price, int $playLength)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->playLength = $playLength;
    }

    public function getPlayLength()
    {
        return $this->playLength;
    }

    public function getSummaryLine()
    {
        $base = parent::getSummaryLine();
        $base .= ": Время звучания - {$this->playLength}";
        return $base;
    }
}


$product1 = new BookProduct(
    'Собачье сердце',
    'Михаил',
    'Булгаков',
    '5.99',
    '127'
);
print "Книга - {$product1->getSummaryLine()}";
print "Автор {$product1->getProducer()}";
print '<br>';

$product2 = new CdProduct(
    'Классическая музыка. Лучшее',
    'Антонио',
    'Вивальди',
    '10.99',
    '60.33'
);
print "Диск - {$product2->getSummaryLine()}";
print "Исполнитель {$product2->getProducer()}";

//  =========================================================================================



























