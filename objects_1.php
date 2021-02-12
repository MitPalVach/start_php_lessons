<?php

class ShopProduct
{
    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $price = 0;

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

    public function getProducer()
{
    return $this->producerFirstName . ' ' . $this->producerMainName;
}
}
$product1 = new ShopProduct(
    'Собачье сердце',
    'Михаил',
    'Булгаков',
    '5.99'
);

class ShopProductWriter
{
    public function write(ShopProduct $shopProduct)
    {
        $str = $shopProduct->title . ": " . $shopProduct->getProducer() . " (" . $shopProduct->price . ")";
        print $str;
    }
}
$product1 = new ShopProduct('Собачье сердце', 'Михаил', 'Булгаков', '5.99');
$writer = new ShopProductWriter();
$writer->write($product1);




















