<?php



class ShopProduct implements Chargeable
{
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
        $product->setID((int) $row['id']);
        $product->setDiscount((int) $row['discount']);
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

    public function CDInfo( CdProduct $prod ) {

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

class Shipping implements Chargeable {
    public function getPrice(): float {

    }
}

interface Chargeable {
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


class XmlProductWriter extends ShopProductWriter {
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


class TextProductWriter extends ShopProductWriter {
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



























